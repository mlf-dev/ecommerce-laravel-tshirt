@extends('process')

@section('content')

    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('cart')}}">Panier</a></li>
            <li class="breadcrumb-item"><a href="{{route('order_auth')}}">Identification</a></li>
            <li class="breadcrumb-item"><a href="{{route('order_adresse')}}">Adresse</a></li>
            <li class="breadcrumb-item"><a href="{{route('order_paiement')}}">Paiement</a></li>
            <li class="breadcrumb-item active" aria-current="page">Merci</li>
        </ol>
    </nav>

    <main role="main">

        <div class="container">
            <div class="py-5 text-center">
                <img src="{{asset('img/goonies_confirmation.gif')}}">

                <h2>Nous avons bien reçu votre commande</h2>
                <p class="lead">Elle sera expédiée dans les plus brefs délais</p>

            </div>
        </div>


    </main>

@endsection