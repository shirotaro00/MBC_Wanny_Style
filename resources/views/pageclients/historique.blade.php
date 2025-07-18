  @extends('partials/clients.App');
@section('style')
@endsection
@section('body')
  @include('partials/clients.navbar')
  <section class="checkout spad">
        <div class="container">

            <form action="#" class="checkout__form">
                <div class="row">
                       <div class="container " >
                <div class="page-inner">
                    <div class="page-header">


                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <center>
                                        <h3>Historique des commandes</h3>
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

                                                <div class="table-responsive " >
                                                    <table class="table  ">
                                                        <thead >
                                                            <tr >
                                                                <th scope="col">Nom article</th>
                                                                <th scope="col">Quantité</th>
                                                                <th scope="col">Categorie</th>
                                                                <th scope="col">Type</th>
                                                                <th scope="col">Taille</th>
                                                                <th scope="col">Couleur</th>
                                                                <th scope="col">Prix unitaire</th>
                                                                <th scope="col">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr >
                                                                <th scope="row">1</th>
                                                                <td>Mark</td>
                                                                <td>Otto</td>
                                                                <td>@mdo</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">2</th>
                                                                <td>Jacob</td>
                                                                <td>Thornton</td>
                                                                <td>@fat</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">3</th>
                                                                <td>John</td>
                                                                <td>Doe</td>
                                                                <td>@social</td>
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

                    </div>
                </div>
            </div>

                        </div>


                    </div>
                </form>
            </div>
        </section>
    @include('partials/clients.footer')

@endsection

@section('script')
