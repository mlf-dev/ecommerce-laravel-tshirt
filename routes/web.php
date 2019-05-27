<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/test/{prenom}', 'Shop\MainController@test'); // prenom ici est déclaré comme une variable, @test est la méthode que l'on appelle du MainController

Route::get('/', 'Shop\MainController@index')->name('homepage'); // on appelle la méthode index du mainController, qui va afficher la view shop.blade.php

Route::get('/product/{id}', 'Shop\MainController@product')->name('voir_produit'); // Permet de faire appel à "voir_produit" lorsque l'on configure les liens dans le code html, ainsi si on change l'uri dans la route, elle sera modifiée automatiquement dans les autres fichiers

Route::get('/category/{id}','Shop\MainController@viewByCat')->name('voir_produits_par_categorie');

Route::post('/cart/add/{id}', 'Shop\CartController@add')->name('cart_add');

Route::post('/cart/update', 'Shop\CartController@update')->name('cart_update');

Route::get('/cart/remove/{id}', 'Shop\CartController@remove')->name('cart_remove');


Route::get('/cart', 'Shop\CartController@cart')->name('cart');

//groupe des routes pour l'authentification généré automatiquement (php artisan make:auth)
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/order/auth', 'Shop\ProcessController@identification')->name('order_auth');

// appel de cette uri en get :
Route::get('/order/adress', 'Shop\ProcessController@adresse')->name('order_adresse');
// appel de cette même uri en post :
Route::post('/order/adress', 'Shop\ProcessController@adresseStore')->name('order_adresse_store');

Route::get('/order/paiement', 'Shop\ProcessController@paiement')->name('order_paiement');
