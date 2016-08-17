<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MyPackageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ .'/../../MyPackageAssets/views', 'MyPackage');
        $this->publishes([
            __DIR__.'/../../MyPackageAssets/assets' => public_path('public/assets/'),
        ], 'public');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
