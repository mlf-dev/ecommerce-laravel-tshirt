@extends('shop')

@section('content')
<div class="container">


    <div class="row justify-content-between">

        <div class="col-6">
            <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="{{asset('produits/'.$product->photo_principale)}}" alt="{{$product->nom}}">

            </div>
        </div>
        <div class="col-6">

            <h1 class="jumbotron-heading">{{$product->nom}}</h1>
            <h5>{{$product->prixTTC()}}</h5>
            <p class="lead text-muted">{{$product->description}}</p>
            @foreach($product->tags as $tag)
                <span class="badge badge-warning">{{$tag->nom}}</span>
            @endforeach
            <hr>

            <form action="{{route('cart_add', ['id'=>$product->id])}}" method="POST" id="cart_add">
                @csrf {{--permet de sécuriser l'envoie du formulaire qui n'est possible qu'à partir du nom de domaine du site et non pas d'un autre, permet de sécuriser la faille des formulaires--}}
                <label for="size">Choisissez votre taille</label>
                <select name="size" id="size" class="form-control">
                    <option value="xs">XS</option>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                    <option value="xl">XL</option>
                    <option value="xxl">XXL</option>
                </select>
            </form>

            {{--form fait le lien avec l'id du formulaire, et bien penser à ajouter le type="submit" au bouton pour que cela fonctionne--}}
            <button form="cart_add" type="submit" class="btn btn-cart my-2 btn-block"><i class="fas fa-shopping-cart"></i>Ajouter au Panier</button>

        </div>
    </div>
</div>


<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            <h3>Vous aimerez aussi :</h3>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img src="produits/hulk.jpg" class="card-img-top img-fluid" alt="Responsive image">

                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <div class="btn-group">
                                <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img src="produits/krusty_simpsons.jpg" class="card-img-top img-fluid" alt="Responsive image">

                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <div class="btn-group">
                                <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img src="produits/star_trek_kirk.jpg" class="card-img-top img-fluid" alt="Responsive image">

                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <div class="btn-group">
                                <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection