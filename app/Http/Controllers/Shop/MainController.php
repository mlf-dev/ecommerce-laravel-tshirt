<?php

namespace App\Http\Controllers\Shop;

use App\Category;
use App\Product;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function test(Request $request){
        $prenom = $request->prenom; // permet de récupérer grâce à Request (Http) les paramètres dans l'url, ici on récupère le paramètre prénom configuré dans les Routes

        return view('test', ['prenom'=>$prenom]); // permet de faire passer la variable prénom dans la vue test
    }

    public function index(){
        // SELECT * FROM products;
        $products = Product::all();

        // SELECT * FROM category;
        //$categories = Category::all(); -> remplacé par View share dans AppServiceProvider

        // var_dump($products);
        // die();
        // dd($products, $categories);

        // On passe les données de la base de données dans la vue :
        return view('shop.index', ['products'=>$products]); // va récupérer le fichier index dans le dossier shop
    }

    public function product(Request $request){ // Request illuminate Http
        // SELECT * FROM product WHERE id = $id_product;
        $id_product = $request->id; // On récupère l'id du produit dans l'url
        $product = Product::find($id_product);

        // On appelle les catégories pour le menu

        return view('shop.product',compact('product'));
        // Equivaut à : return view('shop.product',['product'=>$product]);
    }

    public function viewByCat(Request $request){
        $id_category = $request->id;
        $category = Category::find($id_category);
        $products = $category->products;
        return view('shop.category', compact('category', 'products'));
    }

    public function viewByTag(Request $request){
        $id_tag = $request->id;
        $tag = Tag::find($id_tag);
        $products = $tag->products;
        return view('shop.category', compact('products', 'tag'));
    }
}
