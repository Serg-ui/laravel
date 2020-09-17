<?php

namespace App\Providers;

use App\MyClasses\SortProductsByBrands;
use App\MyInterfaces\SortProductInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SortProductInterface::class, function (){
            return new SortProductsByBrands();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('url', url('assets'));
    }
}
