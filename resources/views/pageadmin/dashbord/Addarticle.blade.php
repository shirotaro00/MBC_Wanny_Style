@extends('pageadmin.dashbord.admin')

@section('body')
    @include('partials.admin.modal.categorie')
    @include('partials.admin.modal.type')
    @include('partials.admin.modal.detail')
    @include('partials.admin.modal.articleCat')

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
                                            data-bs-target="#categorieModal">Catégorie article</button>
                                        <button class="btn btn-secondary" style="margin: 5px" data-bs-toggle="modal"
                                            data-bs-target="#typeModal">Type article</button>
                                        <button class="btn btn-info" style="margin: 5px" data-bs-toggle="modal"
                                            data-bs-target="#detailsModal">Détails article</button>
                                        <button class="btn btn-primary" style="margin: 5px" data-bs-toggle="modal"
                                            data-bs-target="#articleCatModal">Article Categorie</button>
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
                                                    </div>


                                                    <!-- Colonne 2 : Selects -->
                                                    <div class="col-md-6">
                                                        {{-- <div class="mb-3" style="height: 42px ; " >
                                                            <label for="pays" class="form-label">Categories</label>
                                                            <select class="form-select form-control" id="defaultSelect"
                                                                name="categories">
                                                                <option>1</option>
                                                                <option>2</option>

                                                            </select>
                                                        </div> --}}
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
                                                        {{-- <div class="mb-3" style="height: 48px ;padding-top:42px">
                                                            <label for="civilite" class="form-label">Detail</label>
                                                            <select class="form-select form-control" id="defaultSelect"
                                                                name="details">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </div> --}}
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
