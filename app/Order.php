<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    // récupérer l'adresse d'une commande
    public function adresse(){
        return $this->belongsTo('App\Adresse');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    // récupérer les produits de la commande, ainsi que les informations de jointure de la table liées aux produits (withPivot)
    public function products(){
        return $this->belongsToMany('App\Product','order_products')->withPivot([
            'size',
            'qty',
            'prix_unitaire_ht',
            'prix_unitaire_ttc',
            'prix_total_ht',
            'prix_total_ttc'
        ]);
    }
}
