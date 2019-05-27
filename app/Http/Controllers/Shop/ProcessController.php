<?php

namespace App\Http\Controllers\Shop;

use App\Adresse;
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

    public function paiement(){
        $total_a_payer = \Cart::getTotal();
        return view('shop.process.paiement', compact('total_a_payer'));
    }
}
