<?php

namespace App\View\Composers;

use App\Models\SmaCategory;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;

class MenuComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        try {
            // Use cached menu categories to avoid database queries on every page load
            $menuCategories = Cache::remember(
                'menu_categories_with_subcategories',
                \App\Services\PerformanceCacheService::CATEGORY_CACHE_DURATION,
                function () {
                $categories = SmaCategory::mainCategories()
                    ->with(['subcategories' => function($query) {
                        $query->withCount(['subcategoryProducts as subcategory_products_count' => function($q) {
                            $q->where('hide', 0);
                        }]);
                    }])
                    ->withCount(['products as products_count' => function($query) {
                        $query->where('hide', 0);
                    }])
                    ->get();

                // Hide empty subcategories, then hide main categories with no products and no non-empty subs
                $categories = $categories->map(function ($category) {
                    $category->setRelation(
                        'subcategories',
                        $category->subcategories
                            ->filter(fn ($sub) => ($sub->subcategory_products_count ?? 0) > 0)
                            ->values()
                    );

                    return $category;
                })->filter(function ($category) {
                    return ($category->products_count ?? 0) > 0
                        || $category->subcategories->isNotEmpty();
                })->values();

                // Apply config-based ordering without touching database
                try {
                    return \App\Services\CategoryOrderingService::sortCategoriesWithSubcategories($categories);
                } catch (\Exception $e) {
                    // If sorting fails, return categories as-is
                    \Log::error('MenuComposer sorting error: ' . $e->getMessage());
                    return $categories;
                }
            });

            $view->with('menuCategories', $menuCategories);
        } catch (\Exception $e) {
            // If everything fails, provide empty collection to prevent 500 error
            \Log::error('MenuComposer error: ' . $e->getMessage());
            $view->with('menuCategories', collect([]));
        }
    }
}
