<?php

namespace App\Providers;

use App\Models\ProductType;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Facades\View::composer(['layouts.header', 'product_type'], function (View $view) {
            $producttypes = ProductType::all();
            //truyenf biên cho view và product type
            $view->with('producttypes', $producttypes);
        });
    }
}