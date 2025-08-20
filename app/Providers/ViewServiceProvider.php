<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // bütün layoutharda və partial-larda istifadə olunsun
        View::composer('*', function ($view) {
            $menuCategories = Cache::remember('menu_categories', now()->addHour(), function () {
                return Category::whereNull('parent_id')
                    ->with(['children' => function ($q) {
                        $q->orderBy('name')->with(['children' => fn($qq) => $qq->orderBy('name')]);
                    }])
                    ->orderBy('name')
                    ->get();
            });

            $view->with('menuCategories', $menuCategories);
        });
    }

}
