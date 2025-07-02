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
                                        <h3 class="fw-bold mb-3" style="margin-right:400px;margin-top:10px">Stock article
                                        </h3>

                                    </div>
                                    <div class="d-flex justify-content-end gap-2">

                                        <button class="btn btn-primary" style="margin: 5px" data-bs-toggle="modal"
                                            data-bs-target="#categorieModal">Ajout stock</button>

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


                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>

                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>

                                                </td>
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
