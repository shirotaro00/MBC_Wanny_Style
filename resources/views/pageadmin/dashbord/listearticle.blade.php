@extends('pageadmin.dashbord.admin')

@section('body')
    @include('partials.admin.modal.suppressionarticle')
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
                                        <h3 class="fw-bold mb-3" style="margin-right:400px;margin-top:10px">Listes articles
                                        </h3>

                                    </div>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <table class="table table-head-bg-primary mt-4">
                                                <thead>
                                                    <tr>

                                                        <th scope="col">Nom article</th>
                                                        <th scope="col">Type</th>
                                                        <th scope="col">Categorie</th>
                                                        <th scope="col">Taille</th>
                                                        <th scope="col">Couleur</th>
                                                        <th scope="col">Prix unitaire</th>
                                                        <th scope="col">Photo</th>
                                                        <th scope="col">Quantite</th>
                                                        <th scope="col">Description</th>
                                                        <th scope="col">Action</th>


                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($articles as $article)
                                                        <tr>
                                                            <td>{{ $article->nom }}</td>
                                                            <td>{{ $article->typeArticle->nom ?? 'N/A' }}</td>
                                                            <td>{{ $article->categorie }}</td>
                                                            <td>{{ $article->taille }}</td>
                                                            <td>{{ $article->detailArticle->couleur ?? 'N/A' }}</td>

                                                            <td>{{ $article->prix }}</td>
                                                            <td><img src="{{ asset('assets/upload/' . $article->photo) }}"
                                                                    width="50"></td>
                                                            <td>{{ $article->quantite }}</td>

                                                            <td>{{ $article->description }}</td>

                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <a href="{{ route('admin.editarticle', $article->id) }}"
                                                                        class="btn btn-warning btn-sm">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>

                                                                    <!-- Bouton qui ouvre le modal -->
                                                                    <button type="button" style="margin-left: 10px"
                                                                        class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                                        data-bs-target="#modalDelete{{ $article->id }}">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </div>


                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </table>
                                    </div>



                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
