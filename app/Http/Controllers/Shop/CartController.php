<?php

namespace App\Http\Controllers\Shop;

use App\Product;
use Darryldecode\Cart\CartCondition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    // Ajouter un article au panier
    public function add(Request $request) {
        //dd($request->id);
        $id_product = $request->id;
        $product = Product::find($id_product);

        // ne pas faire l'autocomplétion
        \Cart::add(array(
            'id' => $id_product."_".$request->size,
            'name' => $product->nom,
            'price' => $product->prix_ht,
            'quantity' => $request->qty,
            'attributes' => array(
                'size'=>$request->size,
                'photo'=>$product->photo_principale,
                'id' =>$id_product
            )
        ));

        // redirection vers la page du panier (comme un header('Location ...') )
        return redirect(route('cart'));
    }

    // Afficher le contenu d'un panier
    public function cart(){
        // récupérer les produits ajoutés au panier (stockés dans la session du client) :
        $products_cart = \Cart::getContent()->Sort();
        //calculer le sous-total :
        $total_panier_ht = \Cart::getSubTotal();
        $condition = new CartCondition([
            'name'=>'VAT 20%',
            'type'=>'tax',
            'target'=>'total',
            'value'=>'20%'
        ]);
        // Appliquer la condition au panier :
        \Cart::condition($condition);
        // Récupérer le total TTC du panier :
        $total_panier_ttc = \Cart::getTotal();

        //dd($condition);

        return view('shop.cart', compact('products_cart', 'total_panier_ht', 'total_panier_ttc'));
    }

    public function update(Request $request){
        //mettre à jour la quantité d'un produit du panier
        $qty = $request->qty;

        // on vérifie que la quantité soit suppérieur à 0, pour ne pas avoir de valeur négative et se retrouver avec des totaux négatifs.
        if($qty>0){
            // rediriger vers la page du panier avec les données du prix actualisées
            \Cart::update($request->id, array(
                'quantity'=>array(
                    // pour empêcher l'accumulation des quantité, remplace la quantité existante par la nouvelle
                    'relative'=>false,
                    'value'=>$qty
                )
            ));
        }

        // redirection vers la page du panier
        return redirect(route('cart'));
    }

    public function remove(Request $request){
        $id_produit = $request->id;
        \Cart::remove($id_produit);
        return redirect(route('cart'));
    }
}
