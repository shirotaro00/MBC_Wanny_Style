@extends('pageadmin.dashbord.admin')

@section('body')
    @include('partials.admin.modal.type')
    @include('partials.admin.modal.detail')

    <div class="wrapper">
        @include('partials.admin.sidebar')

        <div class="main-panel">
            @include('partials.admin.header')


            <div class="container">
                <div class="page-inner">
                    <div class="page-header">


                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">

                                    <div class="d-flex justify-content-end gap-2">
                                        <h3 class="fw-bold mb-3">Modification article
                                        </h3>
                                    </div>
                                </div>


                                <div class="container mt-5">
                                    <div class="row justify-content-center">
                                        <div class="col-md-8">
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <!-- Colonne gauche -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="nom" class="form-label">Nom article</label>
                                                            <input type="text" class="form-control" id="nom"
                                                                name="nom" value="{{ $article->nom }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="prix" class="form-label">Prix</label>
                                                            <input type="text" class="form-control" id="prix"
                                                                name="prix" value="{{ $article->prix }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="photo" class="form-label">Photo</label>

                                                            <input type="file" class="form-control" id="photo"
                                                                name="photo">
                                                        </div>

                                                        <div class="mb-3" style="height: 42px ; ">
                                                            <label for="categorie" class="form-label">Categories</label>
                                                            <select class="form-select form-control" id="categorie"
                                                                name="categorie">
                                                                <option value="homme"
                                                                    {{ $article->categorie == 'homme' ? 'selected' : '' }}>
                                                                    Homme</option>
                                                                <option value="femme"
                                                                    {{ $article->categorie == 'femme' ? 'selected' : '' }}>
                                                                    Femme</option>
                                                                </select>
                                                        </div>

                                                        <div class="mb-3" style="padding-top:20px">
                                                            <label for="prix" class="form-label">Quantité</label>
                                                            <input type="text" class="form-control" id="prix"
                                                                name="quantite" value="{{ $article->quantite }}">
                                                        </div>
                                                    </div>


                                                    <!-- Colonne 2 : Selects -->
                                                    <div class="col-md-6">

                                                        <div class="mb-3" style="height: 42px ">
                                                            <label for="type_article_id" class="form-label">Type article
                                                            </label>
                                                            <input type="text" class="form-control" id="prix"
                                                                name="type_article" value="{{ $article->typeArticle->nom ?? '' }}">

                                                        </div>
                                                        <div class="mb-3" style="height:42px ;padding-top:20px;">
                                                            <label for="detail_article_id"
                                                                class="form-label">Couleur</label>
                                                            <input type="text" class="form-control" id="prix"
                                                                name="detail_article" value=" {{ $article->detailArticle->couleur ?? '' }}">

                                                        </div>

                                                        <div class="mb-3" style="height:42px ;padding-top:46px;">
                                                            <label for="taille" class="form-label">Taille</label>
                                                            <select class="form-select form-control" id="taille"
                                                                name="taille">
                                                                  <option value="S" {{ $article->detailArticle->taille == 'S' ? 'selected' : '' }}>S</option>
    <option value="M" {{ $article->detailArticle->taille == 'M' ? 'selected' : '' }}>M</option>
    <option value="L" {{ $article->detailArticle->taille == 'L' ? 'selected' : '' }}>L</option>
    <option value="XL" {{ $article->detailArticle->taille == 'XL' ? 'selected' : '' }}>XL</option>
    <option value="XXL" {{ $article->detailArticle->taille == 'XXL' ? 'selected' : '' }}>XXL</option>

                                                            </select>
                                                        </div>

                                                        <div class="mb-3" style="padding-top:65px;">
                                                            <label for="civilite" class="form-label">Description</label>
                                                            <textarea class="form-control" name="description" rows="1">{{ $article->description }}</textarea>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="date_ajout" class="form-label">Date ajout</label>
                                                            <input type="date" class="form-control" id="date_ajout"
                                                                name="date_ajout" value="{{ $article->date_ajout }}">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="boutton " style="margin-bottom: 15px">
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">Envoyer</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
