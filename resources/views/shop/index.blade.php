@extends('shop')
@section('content')
    <section class="py-5 text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Commandez  votre <br><span class="badge badge-light">nouveau</span> <br>T-Shirt <span class="badge badge-primary ">préféré </span>!</h1>
            <p class="lead text-muted">Dénichez THE T-Shirt de votre série, films préféré(e).</p>

        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img src="{{asset('produits/'.$product->photo_principale)}}" class="card-img-top img-fluid" alt="Responsive image">
                        <div class="card-body">
                            <p class="card-text">{{$product->nom}}<br>{{$product->description}}<br>Catégorie : <a href="{{route('voir_produits_par_categorie',['id'=>$product->category->id])}}">{{$product->category->nom}}</a></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">{{$product->prixTTC()}}</span>
                                <a href="{{route('voir_produit',['id'=>$product->id])}}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection