<?php

namespace App\Providers;

use App\Category;
use App\Http\ViewComposers\HeaderComposer;
use Illuminate\Routing\UrlGenerator;
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
    public function boot(UrlGenerator $url)
    {
        if(env('APP_ENV') === "production"){
            $url->forcescheme('https');
        }
        //
        // View::share('categories',Category::all());
        // passer des datas à toutes les pages
        // View::share('categories',Category::where('id_parent','=',null)->get());
        // View::share('total_products_cart',\Cart::getContent()->count());

        // On passe les données à shop et à process (on ajoute shop.* pour faire hériter aussi aux sous-vues les variables, attention à bien laisser 'shop' quand même
        view()->composer(['shop','process','shop.*'],HeaderComposer::class);
    }
}
