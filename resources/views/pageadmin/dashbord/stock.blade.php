@extends('pageadmin.dashbord.admin')

@section('body')
    <div class="wrapper">
        @include('partials.admin.sidebar')
        @include('partials.admin.modal.addstock')

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
                                        <h3 class="fw-bold mb-3" style="margin-right:400px;margin-top:10px">Stock Entrant
                                        </h3>

                                    </div>
                                    <div class="d-flex justify-content-end gap-2">

                                        <button class="btn btn-primary" style="margin: 5px" data-bs-toggle="modal"
                                            data-bs-target="#categorieModal"><i  class="fa-solid fa-circle-plus" style=" font-size:18px;margin-right:5px" ></i>Ajout stock</button>

                                    </div>
                                    <table class="table table-head-bg-primary mt-4">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nom article</th>
                                                <th scope="col">Categorie</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Taille</th>
                                                <th scope="col">Couleur</th>
                                                <th scope="col">Quantite</th>
                                                <th scope="col">Date stock</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($stocks as $stock)
                                                <tr>
                                                    <td>{{ $stock->article->nom ?? '' }}</td>
                                                    <td>{{ $stock->article->categorie ?? '' }}</td>
                                                    <td>{{ $stock->article->typeArticle->nom ?? '' }}</td>
                                                    <td>{{ $stock->article->taille ?? '' }}</td>
                                                    <td>{{ $stock->article->detailArticle->couleur ?? '' }}</td>
                                                    <td>{{ $stock->quantite }}</td>
                                                    <td>{{ $stock->date_stock }}</td>
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

    @if ($errors->any())
    <script>
        // Quand la page est chargée, si erreurs => afficher le modal
        document.addEventListener('DOMContentLoaded', function () {
            let myModal = new bootstrap.Modal(document.getElementById('categorieModal'), {
                keyboard: false
            });
            myModal.show();
        });
    </script>
@endif


