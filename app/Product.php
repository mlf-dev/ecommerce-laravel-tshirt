<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    const TVA_FR = 1.2;
    public function prixTTC(){
        $prix_ttc = $this->prix_ht * self::TVA_FR;
        return number_format($prix_ttc,2)." €";
    }

    public function category() {
        return $this->belongsTo('App\Category', 'id_category');
    }
}
