<?php

namespace App\View\Composers;

use App\Services\PerformanceCacheService;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CategoryComposer
{
    public function compose(View $view): void
    {
        $menuCategories = Cache::remember(
            'menu_categories_top12',
            PerformanceCacheService::CATEGORY_CACHE_DURATION,
            function () {
                $categories = \App\Models\SmaCategory::where(function ($q) {
                    $q->whereNull('parent_id')
                        ->orWhere('parent_id', '')
                        ->orWhere('parent_id', 0);
                })
                    ->with(['subcategories' => function ($query) {
                        $query->withCount(['subcategoryProducts as subcategory_products_count'])
                            ->orderBy('name');
                    }])
                    ->withCount('products')
                    ->orderBy('products_count', 'desc')
                    ->get();

                return $categories->map(function ($category) {
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
                })->take(12)->values();
            }
        );

        $view->with('menuCategories', $menuCategories);
    }
}
