@extends('pageadmin.dashbord.admin')

@section('body')
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
                                        <h3 class="fw-bold mb-3" style="margin-right:400px;margin-top:10px">liste article
                                        </h3>

                                    </div>

                                    <table class="table table-head-bg-primary mt-4">
                                        <thead>
                                            <tr>

                                                <th scope="col">Catégorie</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Article</th>
                                                <th scope="col">Prix</th>
                                                <th scope="col">Photo</th>
                                                <th scope="col">Taille</th>
                                                <th scope="col">Couleur</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Action</th>


                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($articles as $article)
                                                <tr>
                                                    <td>{{ $article->categorie }}</td>
                                                    <td>{{ $article->typeArticle->nom ?? 'N/A' }}</td>
                                                    <td>{{ $article->nom }}</td>
                                                    <td>{{ $article->prix }}</td>
                                                    <td><img src="{{ asset('assets/upload/' . $article->photo) }}"
                                                            width="50"></td>
                                                    <td>{{ $article->taille }}</td>
                                                    <td>{{ $article->detailArticle->couleur ?? 'N/A' }}</td>
                                                    <td>{{ $article->description }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-warning btn-sm"> <i
                                                                class="fas fa-edit"></i> </a>
                                                        <!-- Bouton qui ouvre le modal -->
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#modalDelete{{ $article->id }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>

                                                        <!-- Modal de confirmation -->
                                                        <div class="modal fade" id="modalDelete{{ $article->id }}"
                                                            tabindex="-1" aria-labelledby="modalLabel{{ $article->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="modalLabel{{ $article->id }}">Confirmer la
                                                                            suppression</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Fermer"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Voulez-vous vraiment supprimer cet article ?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary btn-sm"
                                                                            data-bs-dismiss="modal">Non</button>

                                                                        <form
                                                                            action="{{ route('articles.destroy', $article->id) }}"
                                                                            method="POST" style="display:inline;">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="btn btn-danger btn-sm">Oui</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
