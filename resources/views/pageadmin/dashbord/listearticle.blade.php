@extends('pageadmin.dashbord.admin')
@section('style')
<style>
 .scrollable-description {
  max-height: 4.5em;          /* 3 lignes à line-height: 1.5 */
  overflow-y: auto;           /* active scroll vertical */
  line-height: 1.5em;         /* définit la hauteur d'une ligne */
  display: block;             /* nécessaire pour que overflow fonctionne */
}
</style>
@endsection
@section('body')
    @include('partials.admin.modal.suppressionarticle')
@include('partials.admin.modal.ajoutphoto')
    <div class="wrapper">
        @include('partials.admin.sidebar')

        <div class="main-panel">
            @include('partials.admin.header')


            <div class="container" style="background-color: #ffff">
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
                                            <table class="table table-head mt-4">
                                                <thead class="text-white"  style="background-color: #002012">
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
                                                            <td>{{ $article->typeArticle->type ?? 'N/A' }}</td>
                                                            <td>{{ $article->categorie }}</td>
                                                            <td>{{ $article->taille }}</td>
                                                            <td>{{ $article->detailArticle->couleur ?? 'N/A' }}</td>

                                                            <td>{{ $article->prix }}</td>
                                                            <td><img src="{{ asset('assets/upload/' . $article->photo) }}"
                                                                    width="50"></td>
                                                            <td>{{ $article->quantite }}</td>

                                                            <td class="">
                                                                <div class="scrollable-description">{{ $article->description }}</div></td>

                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                     <!-- Bouton qui ouvre le modal d'ajout/modification photo/taille/couleur -->
                                                                    <button type="button" class="btn  btn-sm text-white" style="background-color: #D77F27;margin-right:5px" data-bs-toggle="modal" data-bs-target="#modalEdit">
                                                                        <i class="fas fa-plus"></i>
                                                                    </button>
                                                                    <a href="{{ route('admin.editarticle', $article->id) }}"
                                                                        class="btn btn-sm text-white" style="background-color: #DDA233"  onclick="verifierAcces('{{ auth()->user()->role }}')">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>

                                                                    <!-- Bouton qui ouvre le modal de suppression -->
                                                                    <button type="button"style="margin-left:5px;background-color:#DD3F26"
                                                                        class="btn btn-sm text-white"  data-bs-toggle="modal"
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
