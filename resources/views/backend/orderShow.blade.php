@extends('backend')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Commande N° {{$order->id}}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button class="btn btn-sm btn-outline-secondary">Lister les commandes</button>
                </div>

            </div>
        </div>
        <div class="table-responsive">
            <div class="jumbotron">
                <h1 class="display-6">{{$order->user->name}}</h1>
                <p class="lead">Adresse de livraison</p>
                <p>{{$order->adresse->adresse}}<br>{{$order->adresse->adresse2}}<br> {{$order->adresse->code_postal}} - {{$order->adresse->ville}} - {{$order->adresse->pays}}</p>
                <p>Numéro de transaction Stripe: </p>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr><th>#</th>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>P.U TTC</th>
                    <th class="text-right">Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>
                            <strong>{{$product->nom}} {{$product->pivot->size}}</strong> <br>
                        </td>
                        <td>{{$product->pivot->qty}}</td>
                        <td>{{number_format($product->pivot->prix_unitaire_ttc,2)}} TTC</td>
                        <td class="text-right"> {{number_format($product->pivot->prix_total_ttc,2)}} € TTC</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td>Sous-Total HT:</td>
                    <td class="text-right">{{number_format($order->total_ht,2)}} €</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td>TVA(20%)</td>
                    <td class="text-right">{{number_format($order->tva,2)}} € TTC</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td>TOTAL</td>
                    <td class="text-right">{{number_format($order->total_ttc,2)}} € TTC </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </main>

@endsection