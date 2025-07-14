@extends('pageadmin.dashbord.admin')

@section('body')
    <div class="wrapper">
        @include('partials.admin.sidebar')
        @include('partials.admin.modal.editprofil')

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
                                            <p><strong>Nom :</strong> {{ $user->nom }}</p>
                                            <p><strong>Prénom :</strong> {{ $user->prenom }}</p>
                                            <p><strong>Email :</strong> {{ $user->email }}</p>
                                            <p><strong>Adresse :</strong> {{ $user->adresse }}</p>
                                            <p><strong>Téléphone :</strong> {{ $user->telephone }}</p>
                                        </div>
                                         <center> <button class="btn btn-primary" style="margin-bottom: 15px" data-bs-toggle="modal"
                                            data-bs-target="#editprofilModal">Modifier </button></center>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @if ( $errors->has('nom') ||
        $errors->has('prenom') ||
        $errors->has('telephone') ||
        $errors->has('adresse') ||
        $errors->has('password'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let editprofilModal = new bootstrap.Modal(document.getElementById('editprofilModal'), {
                keyboard: false
            });
            editprofilModal.show();
        });
    </script>
@endif
