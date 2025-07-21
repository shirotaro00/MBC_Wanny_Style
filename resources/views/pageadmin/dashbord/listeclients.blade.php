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
                                        <h3 class="fw-bold mb-3" style="margin-right:400px;margin-top:10px">Liste clients
                                        </h3>

                                    </div>

                                    <table class="table table-head-bg-primary mt-4">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nom </th>
                                                <th scope="col">Prenom</th>
                                                <th scope="col">Telephone</th>
                                                <th scope="col">Adresse</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Point</th>

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
    @endsection
