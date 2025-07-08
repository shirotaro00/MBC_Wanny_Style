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
                                        <h3 class="fw-bold mb-3" style="margin-right:250px;margin-top:10px">Ajout article
                                        </h3>

                                        <button class="btn btn-primary" style="margin: 5px" data-bs-toggle="modal"
                                            data-bs-target="#typeModal"><i  class="fa-solid fa-circle-plus" style=" font-size:18px;margin-right:5px" ></i> Type article</button>
                                        <button class="btn btn-primary" style="margin: 5px" data-bs-toggle="modal"
                                            data-bs-target="#detailsModal"><i  class="fa-solid fa-circle-plus" style=" font-size:18px;margin-right:5px" ></i>Détails article</button>

                                    </div>
                                </div>


                                <div class="container mt-5">
                                    <div class="row justify-content-center">
                                        <div class="col-md-8">
                                            <form action="{{ route('articles.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <!-- Colonne gauche -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="nom" class="form-label">Nom article</label>
                                                            <input type="text" class="form-control" id="nom"
                                                                name="nom" placeholder="nom article">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="prix" class="form-label">Prix</label>
                                                            <input type="text" class="form-control" id="prix"
                                                                name="prix" placeholder="Prix">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="photo" class="form-label">Photo</label>
                                                            <input type="file" class="form-control" id="photo"
                                                                name="photo" placeholder="">
                                                        </div>

                                                        <div class="mb-3" style="height: 42px ; ">
                                                            <label for="categorie" class="form-label">Categories</label>
                                                            <select class="form-select form-control" id="categorie"
                                                                name="categorie">
                                                                <option value="homme">Homme</option>
                                                                <option value="femme">Femme</option>

                                                            </select>
                                                        </div>

                                                        <div class="mb-3" style="padding-top:20px">
                                                            <label for="prix" class="form-label">Quantité</label>
                                                            <input type="text" class="form-control" id="prix"
                                                                name="quantite" placeholder="quantite">
                                                        </div>
                                                    </div>


                                                    <!-- Colonne 2 : Selects -->
                                                    <div class="col-md-6">

                                                        <div class="mb-3" style="height: 42px ">
                                                            <label for="type_article_id" class="form-label">Type article
                                                            </label>
                                                            <select class="form-select form-control" id="type_article_id"
                                                                name="type_article_id">
                                                                @foreach ($types as $type)
                                                                    <option value="{{ $type->id }}">{{ $type->nom }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3" style="height:42px ;padding-top:20px;">
                                                            <label for="detail_article_id"
                                                                class="form-label">Couleur</label>
                                                            <select class="form-select form-control" id="detail_article_id"
                                                                name="detail_article_id">
                                                                @foreach ($details as $detail)
                                                                    <option value="{{ $detail->id }}">
                                                                        {{ $detail->couleur }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="mb-3" style="height:42px ;padding-top:46px;">
                                                            <label for="taille" class="form-label">Taille</label>
                                                            <select class="form-select form-control" id="taille"
                                                                name="taille">
                                                                <option value="L">L</option>
                                                                <option value="S">S</option>
                                                                <option value="M">M</option>
                                                                <option value="XL">XL</option>
                                                                <option value="XXL">XXL</option>

                                                            </select>
                                                        </div>

                                                        <div class="mb-3" style="padding-top:65px;">
                                                            <label for="civilite" class="form-label">Description</label>
                                                            <textarea class="form-control" name="description" rows="1"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="boutton " style="margin-bottom: 15px">
                                        <div class="d-flex justify-content-end">
                                            <button type="submit"  onclick="verifierAcces('{{ auth()->user()->role }}')" class="btn btn-primary">Envoyer <i class="fa-solid fa-square-arrow-up-right"></i></button>
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
