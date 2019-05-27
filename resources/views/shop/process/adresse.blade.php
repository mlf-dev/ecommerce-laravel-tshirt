@extends('process')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Panier</a></li>
        <li class="breadcrumb-item"><a href="#">Identification</a></li>
        <li class="breadcrumb-item active" aria-current="page">Adresse</li>
        <li class="breadcrumb-item"><a href="#">Paiement</a></li>
        <li class="breadcrumb-item"><a href="#">Merci</a></li>
    </ol>
</nav>

<main role="main">

    <div class="container">
        <div class="py-5 text-center">
            <i class="fas fa-4x fa-shipping-fast"></i>


            <h2>Votre adresse de livraison</h2>

        </div>

        <div class="row">

            <div class="col-md-12 order-md-1">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <label for="prenom">Votre prénom</label>
                            <input type="text" class="form-control" id="prenom" name="nom">
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="nom">Votre nom <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nom" name="nom">
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="telephone">Votre téléphone <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="telephone" name="code_postal">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Votre adresse <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="address">
                    </div>

                    <div class="mb-3">
                        <label for="address2">Complément d'adresse<span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" id="address2" name="address2">
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <label for="ville">Votre ville <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="ville" name="code_postal">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="code_postal">Votre code postal <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="code_postal" name="code_postal">
                        </div>

                        <div class="col-md-5 mb-3">
                            <label for="country">Votre pays <span class="text-danger">*</span></label>
                            <select class="custom-select d-block w-100" id="country" required>
                                <option value="FR">France</option>
                                <option value="BE">Belgique</option>
                                <option value="CH">Suisse</option>
                            </select>
                        </div>


                    </div>


                    <hr class="mb-4">
                    <button class="btn btn-outline-dark btn-lg btn-block" type="submit">Procéder au paiement</button>
                </form>
            </div>
        </div>
    </div>

</main>

@endsection