<?php

namespace App\Http\Controllers\Shop;

use App\Adresse;
use App\Order;
use App\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProcessController extends Controller
{

    public function __construct()
    {
        // ici on indique que l'on doit être obligatoirement identifié pour pouvoir accéder aux pages, sauf la page d'identification, qui est accessible à tout le monde
        $this->middleware('auth')->except('identification');
        // ici on indique que l'on ne peut accéder qu'à identification en étant invité (donc non logué)
        $this->middleware('guest')->only('identification');
    }

    // Etape 1, identification :
    public function identification(){
        return view('shop.process.identification');
    }

    // Etape 2, adresse de livraison :
    public function adresse(){
        return view('shop.process.adresse');
    }

    // Etapue 2 bis, stocker l'adresse de livraison dans la DB
    public function adresseStore(Request $request){
        // Récupération de toutes les datas du formulaire
        // dd($request->all());
        // validation
        $request->validate([
            'nom'=>'required',
            'adresse'=>'required',
            'telephone'=>'required|digits:10',
            'code_postal'=>'required',
            'ville'=>'required',
            'pays'=>'required'
        ]);
        // Création de l'entité et hydratation :
        $adresse = new Adresse();
        // Hydrater tous les attributs de l'adresse en une seule ligne :
        $adresse->fill($request->all()); // Equivaut à $adresse->nom = request->nom; $adresse->prenom = request->prenom .....
        // Sauvegarder dans la db :
        $adresse->save();
        // récupération du user connecté pour lui associer l'adresse qui vient d'être créée (formule toute faite par Laravel :)
        $user_auth = Auth::user();
        // On joint l'adresse qui vient d'être créée et le user
        $user_auth->adresse_id = $adresse->id;
        // On sauvegarde dans la base de donnée
        $user_auth->save();

        // Redirection vers la page pour procéder au paiement
        return redirect(route('order_paiement'));
    }

    // Etape 3 page de confirmation de paiement :
    public function paiement(){
        $total_a_payer = \Cart::getTotal();
        return view('shop.process.paiement', compact('total_a_payer'));
    }

    // etape 3 bis création de la commande dans la db
    public function confirmationCommande(){

        // Création de l'objet Order commande et hydratation
        $order = new Order();
        $order->total_ttc = \Cart::getTotal();
        $order->total_ht = \Cart::getSubTotal();
        $order->tva = \Cart::getTotal() - \Cart::getSubTotal();
        $order->taux_tva = 20;
        $user = Auth::user();
        // Associer Order à une adresse de livraison entré par l'utilisateur
        $order->adresse_id = $user->adresse_id;
        // Associer Order à l'utilisateur connecté
        $order->user_id = $user->id;
        // On envoie dans la base de données :
        $order->save();
        // Création d'un objet OrderProduct par produit dans le panier
        $products = \Cart::getContent();
        foreach($products as $product){
            $order_product = new OrderProduct();
            $order_product->qty = $product['quantity']; // récupéré grâce au stockage des attributs dans CartContropller méthode add
            $order_product->prix_unitaire_ht = $product['price'];
            $order_product->prix_unitaire_ttc = $product['price'] * 1.2;

            $prix_total_ttc = ($product['price'] * $product['quantity']) * 1.2;
            $prix_total_ht = $product['price'] * $product['quantity'];

            $order_product->prix_total_ttc = $prix_total_ttc;
            $order_product->prix_total_ht = $prix_total_ht;
            $order_product->size = $product['attributes']['size'];
            $order_product->order_id = $order->id;
            $order_product->product_id = $product['attributes']['id'];

            // on sauvegarde dans la base de données
            $order_product->save();
        }

        // Vider le panier
        \Cart::clear();
        // Rediriger vers page merci
        return redirect(route('order_merci'));
    }

    // Etape 4 : redirection vers la page merci
    public function merci(){

    }
}
