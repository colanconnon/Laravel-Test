# To install the custom elements

1) Move the MyPackage and MyPackageAssets folders to your project root folder

2) Create Provider below in the providers folder

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

3) Register the provider in app.php

4) Run 

    php artisan vendor:publish --tag=public --force
