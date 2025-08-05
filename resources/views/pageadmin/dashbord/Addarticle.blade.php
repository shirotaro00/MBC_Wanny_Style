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
                                        {{-- //bouton type et detail --}}
                                        <h3 class="fw-bold mb-3" style="margin-right:250px;margin-top:10px">Ajout article
                                        </h3>

                                        <button class="btn text-white" style="margin: 5px; background-color: #DDA233" data-bs-toggle="modal"
                                            data-bs-target="#typeModal"><i class="fa-solid fa-circle-plus"
                                                style=" font-size:18px;margin-right:5px"></i> Type article</button>
                                        <button class="btn text-white" style="margin: 5px; background-color: #DD3F26" data-bs-toggle="modal"
                                            data-bs-target="#detailsModal"><i class="fa-solid fa-circle-plus"
                                                style=" font-size:18px;margin-right:5px"></i>Ajout couleur</button>

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
                                                        {{-- nom article --}}
                                                        <div class="mb-3">
                                                            <label for="nom" class="form-label">Nom article</label>
                                                            <input type="text" class="form-control" id="nom" value="{{ old('nom') }}"
                                                                name="nom" placeholder="Nom article">
                                                        </div>

                                                        {{-- prix --}}
                                                        <div class="mb-3">
                                                            <label for="prix" class="form-label">Prix</label>
                                                            <input type="text"
                                                                class="form-control @error('prix') is-invalid @enderror"
                                                                id="prix" name="prix" value="{{ old('prix') }}"
                                                                placeholder="Prix">

                                                            @error('prix')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        {{-- photo --}}
                                                        <div class="mb-3">
                                                            <label for="photo" class="form-label">Photo</label>
                                                            <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo"
                                                                name="photo" placeholder="">

                                                            @error('photo')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                           {{-- Categories --}}
                                                        <div class="mb-3" style="height: 42px ; ">
                                                            <label for="categorie" class="form-label">Categories</label>
                                                            <select class="form-select form-control" id="categorie"
                                                                name="categorie">
                                                                <option value="homme">Homme</option>
                                                                <option value="femme">Femme</option>

                                                            </select>
                                                        </div>
                                                                    {{-- Quantité --}}
                                                        <div class="mb-3" style="height: 42px ; margin-top: 30px;">
                                                            <label for="quantite" class="form-label">Quantité</label>
                                                            <input type="text"
                                                                class="form-control @error('quantite') is-invalid @enderror"
                                                                id="quantite" name="quantite" value="{{ old('quantite') }}"
                                                                placeholder="Quantité">

                                                            @error('quantite')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                    </div>

                                                <!-- Colonne 2 : Selects -->
                                                <div class="col-md-6">
                                                               {{-- Type article --}}
                                                    <div class="mb-3" style="height: 42px ">
                                                        <label for="type_article_id" class="form-label">Type article
                                                        </label>
                                                        <select class="form-select form-control" id="type_article_id"
                                                            name="type_article_id">
                                                            @foreach ($types as $type)
                                                                <option value="{{ $type->id }}">{{ $type->type }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    {{-- couleur --}}
                                                    <div class="mb-3" style="height:42px ;padding-top:20px;">
                                                        <label for="detail_article_id" class="form-label">Couleur</label>
                                                        <select class="form-select form-control" id="detail_article_id"
                                                            name="detail_article_id">
                                                            @foreach ($details as $detail)
                                                                <option value="{{ $detail->id }}">
                                                                    {{ $detail->couleur }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                            {{-- taille --}}
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
                                                              {{-- description --}}
                                                    <div class="mb-3" style="padding-top:65px;">
                                                        <label for="civilite" class="form-label">Description</label>
                                                        <textarea class="form-control" name="description"{{ old('description') }}  rows="1"></textarea>
                                                    </div>
                                                </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- bouton envoyer --}}
                                <div class="boutton " style="margin-bottom: 15px; margin-right:20px">
                                    <div class="d-flex justify-content-end ">
                                        <button type="submit" onclick="verifierAcces('{{ auth()->user()->role }}')"
                                            class="btn text-white" style="background-color: #0BA883">
                                            <i class="fa-solid fa-bookmark" style="margin-right: 5px"></i>
                                            Enregister </button>
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

@if ($errors->has('type'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let typeModal = new bootstrap.Modal(document.getElementById('typeModal'), {
                keyboard: false
            });
            typeModal.show();
        });
    </script>
@endif

@if ($errors->has('couleur'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let detailsModal = new bootstrap.Modal(document.getElementById('detailsModal'), {
                keyboard: false
            });
            detailsModal.show();
        });
    </script>
@endif



