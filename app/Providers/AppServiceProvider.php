<?php

namespace App\Providers;

use App\Services\ImageStoreService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ImageStoreService::class, function ($app) {
            return new ImageStoreService();
        });
    }
}
