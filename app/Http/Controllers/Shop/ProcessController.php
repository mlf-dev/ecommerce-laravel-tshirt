<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProcessController extends Controller
{
    // Etape 1, identification :
    public function identification(){
        return view('shop.process.identification');
    }

    // Etape 2, adresse de livraison :
    public function adresse(){
        return view('shop.process.adresse');
    }
}
