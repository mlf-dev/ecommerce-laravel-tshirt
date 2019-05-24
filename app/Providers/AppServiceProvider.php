<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\Facades\View;
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
        //
        //View::share('categories',Category::all());
        // passer des datas à toutes les pages
        View::share('categories',Category::where('id_parent','=',null)->get());
//        View::share('total_products_cart',\Cart::getContent()->count());
    }
}
