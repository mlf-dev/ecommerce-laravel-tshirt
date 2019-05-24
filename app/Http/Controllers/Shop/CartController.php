<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    // Ajouter un article au panier
    public function add(Request $request) {
        dd($request->id);
    }
}
