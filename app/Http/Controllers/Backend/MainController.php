<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    //
    public function loginBackend(){
        return view('backend.login');
    }

    // Afficher la page d'accueil : la page des commandes
    public function home(){

    }
}
