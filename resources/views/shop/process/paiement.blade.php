@extends('process')

@section('content')

    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('cart')}}">Panier</a></li>
            <li class="breadcrumb-item"><a href="{{route('order_auth')}}">Identification</a></li>
            <li class="breadcrumb-item"><a href="{{route('order_adresse')}}">Adresse</a></li>
            <li class="breadcrumb-item active" aria-current="page">Paiement</li>
            <li class="breadcrumb-item"><a href="#">Merci</a></li>
        </ol>
    </nav>

    <main role="main">

        <div class="container">
            <div class="py-5 text-center">

                <h2>Paiement par chèque :</h2>
                <address>
                    <strong>MonTshirt Store</strong><br>
                    <p>25 rue de la mode</p>
                    <p>75020 Paris</p>
                </address>
                <h4 class="mt-5">Total à régler: {{number_format($total_a_payer,2)}} € TTC</h4>

            </div>

            <div class="row">

                <div class="col-md-12 order-md-1">

                    <button class="btn btn-warning btn-lg btn-block" type="submit">Valider ma commande</button>
                </div>
            </div>
        </div>
    </main>

@endsection