@extends('pageadmin.dashbord.admin')

@section('body')
    <div class="wrapper">
        @include('partials.admin.sidebar')

        <div class="main-panel">
            @include('partials.admin.header')


            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <a href="{{ route('admin.accueil') }}"><i class="far fa-chart-bar"></i>Tableau de bord</a>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            Profil Administrateur
                                        </div>
                                        <div class="card-body">
                                            <p><strong>Nom :</strong> {{ $admin->nom }}</p>
                                            <p><strong>Prénom :</strong> {{ $admin->prenom }}</p>
                                            <p><strong>Email :</strong> {{ $admin->email }}</p>
                                            <p><strong>Adresse :</strong> {{ $admin->adresse }}</p>
                                            <p><strong>Téléphone :</strong> {{ $admin->telephone }}</p>
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
