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
                                    <center>
                                        <h3>Commande à valider</h3>
                                    </center>

                                </div>

                                <div class="row row-cols-1 row-cols-md-1 g-4 justify-content-center"
                                    style="margin-top: 20px; padding-left: 30px; padding-right: 30px; ">
                                    <div class="col mb-4">
                                        <div class="card h-100 "
                                            style="margin-left: 10px; margin-right: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.25);">
                                            <div class="card-body">
                                                <h5 class="card-title">Commande le:</h5>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p>Nom :</p>
                                                        <p>Prenom :</p>
                                                        <p>Adresse :</p>
                                                        <p>Telephone :</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>Date de livraison :</p>
                                                        <p>Ref-article :</p>
                                                        <p>Ref-paiement :</p>
                                                    </div>
                                                </div>

                                                <div class="table1-responsive ">
                                                    <table class="table1 table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th >Nom article</th>
                                                                <th >Quantité</th>
                                                                <th >Categorie</th>
                                                                <th >Type</th>
                                                                <th >taille</th>
                                                                <th >Couleur</th>
                                                                <th >Prix unitaire</th>
                                                                <th >Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th>1</th>
                                                                <td>Mark</td>
                                                                <td>Otto</td>
                                                                <td>@mdo</td>
                                                            </tr>
                                                            <tr>
                                                                <th >2</th>
                                                                <td>Jacob</td>
                                                                <td>Thornton</td>
                                                                <td>@fat</td>
                                                            </tr>
                                                            <tr>
                                                                <th >3</th>
                                                                <td>John</td>
                                                                <td>Doe</td>
                                                                <td>@social</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="d-flex justify-content-end mt-5">
                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Valider</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
