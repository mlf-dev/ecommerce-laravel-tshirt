<?php

namespace App\Http\Controllers\Backend;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    //
    public function loginBackend(){
        return view('backend.login');
    }

    // Afficher la page d'accueil : la page des commandes
    public function index(){
        // SELECT * FROM orders
        //$orders = Order::all();

        // on veut paginer (avoir 1 résultat par page) :
        // SELECT * FROM orders LIMIT 10
        $orders = Order::paginate(7);
        return view('backend.index', compact('orders'));
    }

    public function orderShow(Request $request){
        // récupérer l'id de la commande à afficher via les param dans la route
        $order_id = $request->id;
        // récupérer la commande grâce à son id dans la DB
        $order = Order::find($order_id);
        // afficher la page commande
        return view('backend.orderShow', compact('order'));
    }

    public function orderExpedie(Request $request){
        $order_id = $request->id;
        $order = Order::find($order_id);
        $order->is_expedie = true;
        $order->save();
    }
}
