<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(\App\Services\Cart\Service::class, function ($app) {
            return new \App\Services\Cart\Service();
        });
        $this->app->singleton(\App\Services\Wishlist\Service::class, function ($app) {
            return new \App\Services\Wishlist\Service();
        });
        $this->app->singleton(\App\Services\Product\Service::class, function ($app) {
            return new \App\Services\Product\Service(new Product());
        });
        $this->app->singleton(\App\Services\Profile\Service::class, function ($app) {
            return new \App\Services\Profile\Service(new User());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
