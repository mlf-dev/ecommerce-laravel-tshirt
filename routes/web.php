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

Route::get('/', 'Shop\MainController@index'); // on appelle la méthode index du mainController, qui va afficher la view shop.blade.php

Route::get('/product/{id}', 'Shop\MainController@product')->name('voir_produit'); // Permet de faire appel à "voir_produit" lorsque l'on configure les liens dans le code html, ainsi si on change l'uri dans la route, elle sera modifiée automatiquement dans les autres fichiers

Route::get('/category/{id}','Shop\MainController@viewByCat')->name('voir_produit_par_categorie');