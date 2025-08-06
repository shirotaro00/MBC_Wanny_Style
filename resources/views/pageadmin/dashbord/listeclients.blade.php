@extends('pageadmin.dashbord.admin')

@section('body')
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
                                    <h4 class="card-title">Liste des clients</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Prénom</th>
                                                    <th>Téléphone</th>
                                                    <th>Adresse</th>
                                                    <th>Email</th>
                                                    <th>Point</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($clients as $client)
                                                    <tr>
                                                    <td>{{ $client->nom }}</td>
                                                    <td>{{ $client->prenom }}</td>
                                                    <td>{{ $client->telephone }}</td>
                                                    <td>{{ $client->adresse }}</td>
                                                    <td>{{ $client->email }}</td>
                                                    <td>{{ $client->point }}</td>
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
        </div>
        @endsection
