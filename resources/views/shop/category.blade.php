@extends('shop')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">{{$category->nom}}</li>
            <li class="breadcrumb-item"><a href="#">Les goonies</a></li>
            <li class="breadcrumb-item"><a href="#">Star Wars</a></li>
            <li class="breadcrumb-item"><a href="#">Star Trek</a></li>
            <li class="breadcrumb-item"><a href="#">Superman</a></li>
        </ol>
    </nav>

    <div class="py-3">
        <div class="container-fluid">
            <div class="row">
                @foreach ($products as $product)
                <div class="col-md-3">
                    <div class="card mb-4 box-shadow">
                        <img src="{{asset('produits/'.$product->photo_principale)}}" class="card-img-top img-fluid" alt="Responsive image">
                        <div class="card-body">
                            <p class="card-text">{{$product->nom}}<br>{{$product->description}}</p>
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