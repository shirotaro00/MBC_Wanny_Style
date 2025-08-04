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
                                        <h3 class="fw-bold mb-3" style="margin-right:400px;margin-top:10px">Stock Entrant
                                        </h3>

                                    </div>
                                    <table class="table table-head mt-4">
                                        <thead  style="background-color:#E6EAC9;">
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
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
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


