@extends('pageadmin.dashbord.admin')

@section('body')
    <div class="wrapper">
        @include('partials.admin.sidebar')
        @include('partials.admin.modal.editprofil')

        <div class="main-panel">
            @include('partials.admin.header')


            <div class="container" style="background-color: #ffff">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3> Profil Administrateur</h3>
                                        </div>
                                        <div class="card-body">
                                            <p><strong>Nom :</strong> {{ $user->nom }}</p>
                                            <p><strong>Prénom :</strong> {{ $user->prenom }}</p>
                                            <p><strong>Email :</strong> {{ $user->email }}</p>
                                            <p><strong>Adresse :</strong> {{ $user->adresse }}</p>
                                            <p><strong>Téléphone :</strong> {{ $user->telephone }}</p>
                                        </div>
                                         <center> <button class="btn text-white" style="margin-bottom: 15px;background-color: #DDA233" data-bs-toggle="modal"
                                            data-bs-target="#editprofilModal">
                                            <i class="fa fa-refresh" style="margin-right: 5px"></i>Modifier </button></center>
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
