<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use App\Models\SmaCategory;
use App\Models\SmaProduct;

class PerformanceCacheService
{
    /** Product list cache TTL (seconds) */
    const CACHE_DURATION = 1800; // 30 minutes

    /** Category/menu cache TTL (seconds) */
    const CATEGORY_CACHE_DURATION = 3600; // 1 hour
    
    /**
     * Get cached main categories with product counts
     */
    public static function getMainCategories()
    {
        return Cache::remember('main_categories_with_counts', self::CATEGORY_CACHE_DURATION, function () {
            $categories = SmaCategory::mainCategories()
                ->withCount(['products as total_products_count' => function($query) {
                    $query->where('hide', 0);
                }])
                ->withCount(['subcategoryProducts as subcategory_products_count' => function($query) {
                    $query->where('hide', 0);
                }])
                ->get()
                ->map(function($category) {
                    $category->active_products_count = $category->total_products_count + $category->subcategory_products_count;
                    return $category;
                });

            // Apply config-based ordering without touching database
            return \App\Services\CategoryOrderingService::sortCategories($categories);
        });
    }

    /**
     * Get cached categories for navigation (simple)
     */
    public static function getNavigationCategories()
    {
        return Cache::remember('navigation_categories', self::CATEGORY_CACHE_DURATION, function () {
            $categories = SmaCategory::mainCategories()
                ->select(['id', 'name', 'slug'])
                ->get();

            // Apply config-based ordering without touching database
            return \App\Services\CategoryOrderingService::sortCategories($categories);
        });
    }

    /**
     * Get cached featured products for homepage
     */
    public static function getFeaturedProducts($limit = 8)
    {
        return Cache::remember("featured_products_{$limit}", self::CACHE_DURATION, function () use ($limit) {
            return SmaProduct::featured()
                ->active()
                ->select(['id', 'name', 'price', 'promo_price', 'quantity', 'category_id', 'product_status', 'image', 'promotion'])
                ->with([
                    'category:id,name,slug',
                    'photos:id,product_id,photo',
                    'status:id,status_name'
                ])
                ->orderByRaw("
                    CASE 
                        WHEN quantity > 10 THEN 1 
                        WHEN quantity > 0 THEN 2 
                        ELSE 3 
                    END ASC
                ")
                ->orderBy('id', 'desc')
                ->take($limit)
                ->get();
        });
    }

    /**
     * Get cached latest products
     */
    public static function getLatestProducts($limit = 4)
    {
        return Cache::remember("latest_products_{$limit}", self::CACHE_DURATION, function () use ($limit) {
            return SmaProduct::active()
                ->select(['id', 'name', 'price', 'promo_price', 'quantity', 'category_id', 'product_status', 'image'])
                ->with([
                    'category:id,name,slug',
                    'photos:id,product_id,photo',
                    'status:id,status_name'
                ])
                ->orderByRaw("
                    CASE 
                        WHEN quantity > 10 THEN 1 
                        WHEN quantity > 0 THEN 2 
                        ELSE 3 
                    END ASC
                ")
                ->orderBy('id', 'desc')
                ->take($limit)
                ->get();
        });
    }

    /**
     * Get cached promotion products
     */
    public static function getPromotionProducts($categoryId = null, $limit = 12)
    {
        $cacheKey = "promotion_products_" . ($categoryId ?? 'all') . "_{$limit}";
        
        return Cache::remember($cacheKey, self::CACHE_DURATION, function () use ($categoryId, $limit) {
            $query = SmaProduct::active()
                ->select(['id', 'name', 'price', 'promo_price', 'quantity', 'category_id', 'subcategory_id', 'product_status', 'image', 'promotion', 'slug', 'wholesale', 'in_stock_uae', 'start_date', 'end_date'])
                ->where('promotion', 1)
                ->where('promo_price', '>', 0)
                ->where(function ($q) {
                    $q->where('quantity', '>', 0)
                      ->orWhere('in_stock_uae', 1);
                })
                ->with([
                    'category:id,name,slug',
                    'subcategory:id,name,slug',
                    'photos:id,product_id,photo',
                    'status:id,status_name'
                ])
                ->where(function($q) {
                    $q->whereNull('start_date')
                      ->orWhereNull('end_date')
                      ->orWhere(function($dateQuery) {
                          $dateQuery->where('start_date', '<=', now())
                                   ->where('end_date', '>=', now());
                      });
                });

            if ($categoryId) {
                $query->where(function($q) use ($categoryId) {
                    $q->where('category_id', $categoryId)
                      ->orWhere('subcategory_id', $categoryId);
                });
            }

            return $query->orderByRaw('((price - promo_price) / price) DESC')
                         ->orderByRaw("
                             CASE 
                                 WHEN quantity > 10 THEN 1 
                                 WHEN quantity > 0 THEN 2 
                                 ELSE 3 
                             END ASC
                         ")
                         ->take($limit)
                         ->get();
        });
    }

    /**
     * Homepage: ~N products per main category, grouped for category-wise display.
     */
    public static function getHomepageProductsByCategory(int $perCategory = 5)
    {
        return Cache::remember("homepage_category_products_{$perCategory}", self::CACHE_DURATION, function () use ($perCategory) {
            $categories = self::getMainCategories()
                ->filter(fn ($category) => $category->active_products_count > 0);

            return $categories->map(function ($category) use ($perCategory) {
                $products = SmaProduct::active()
                    ->select([
                        'id', 'name', 'price', 'promo_price', 'quantity', 'category_id',
                        'subcategory_id', 'product_status', 'image', 'promotion', 'slug',
                        'start_date', 'end_date', 'wholesale', 'in_stock_uae',
                    ])
                    ->where(function ($query) use ($category) {
                        $query->where('category_id', $category->id)
                            ->orWhere('subcategory_id', $category->id);
                    })
                    ->with([
                        'category:id,name,slug',
                        'photos:id,product_id,photo',
                        'status:id,status_name',
                    ])
                    ->orderByRaw('
                        CASE
                            WHEN quantity > 10 THEN 1
                            WHEN quantity > 0 THEN 2
                            ELSE 3
                        END ASC
                    ')
                    ->orderBy('id', 'desc')
                    ->take($perCategory)
                    ->get();

                return (object) [
                    'category' => $category,
                    'products' => $products,
                ];
            })->filter(fn ($section) => $section->products->isNotEmpty())->values();
        });
    }

    /**
     * Clear all product-related caches
     */
    public static function clearProductCaches()
    {
        $patterns = [
            'featured_products_*',
            'latest_products_*',
            'promotion_products_*',
            'category_products_*',
            'homepage_category_products_*',
        ];

        foreach ($patterns as $pattern) {
            Cache::flush(); // For simplicity, we'll flush all cache
        }
    }

    /**
     * Clear category caches
     */
    public static function clearCategoryCaches()
    {
        Cache::forget('main_categories_with_counts');
        Cache::forget('navigation_categories');
        Cache::forget('menu_categories_with_subcategories');
        Cache::forget('menu_categories_top12');
    }

    /**
     * Warm up essential caches
     */
    public static function warmUpCaches()
    {
        // Warm up frequently accessed data
        self::getNavigationCategories();
        self::getMainCategories();
        self::getFeaturedProducts(8);
        self::getLatestProducts(4);
        self::getPromotionProducts(null, 12);
        self::getHomepageProductsByCategory(5);
    }
}
