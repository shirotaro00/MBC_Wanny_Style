@extends('pageadmin.dashbord.admin')

@section('body')
    <div class="wrapper">
        @include('partials.admin.sidebar')
        @include('partials.admin.modal.addpayement')
        @include('partials.admin.modal.modifipaiement')
        @include('partials.admin.modal.suppressionpay')

        <div class="main-panel">
            @include('partials.admin.header')


            <div class="container ">
                <div class="page-inner">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">

                                    <div class="d-flex justify-content-end gap-2">
                                        <h3 class="fw-bold mb-3" style="margin-right:400px;margin-top:10px"> Methode de
                                            paiement
                                        </h3>

                                    </div>
                                    <div class="d-flex justify-content-end gap-2">

                                        <button class="btn btn-primary" style="margin: 5px" data-bs-toggle="modal"
                                            data-bs-target="#payementModal"><i class="fa-solid fa-circle-plus"
                                                style=" font-size:18px;margin-right:5px"></i> Type de paiement</button>

                                    </div>
                                    <div class="container mt-5">
                                        <div class="row justify-content-center">
                                            <div class="col-md-8">
                                                <form action="{{ route('store.methode') }}" method="POST"
                                                    enctype="multipart/form-data">

                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="nom" class="form-label">Nom</label>
                                                                <input type="text"  class="form-control @error('nom') is-invalid @enderror" id="nom"
                                                                    name="nom" placeholder="Nom du compte">
                                                                            @error('nom')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="numero" class="form-label">Numero</label>
                                                                <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="numero"
                                                                    name="telephone" placeholder="numero">
                                                                            @error('telephone')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                            </div>

                                                            <div class="mb-3" style="height: 42px ; ">
                                                                <label for="categorie" class="form-label">Type de
                                                                    paiement</label>
                                                                <select class="form-select form-control" id="type_paiement"
                                                                    name="type_paiement_id">
                                                                    @foreach ($types as $type)
                                                                        <option value="{{ $type->id }}">
                                                                            {{ $type->type }}
                                                                        </option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">

                                                            <div class="mb-3">
                                                                @foreach ($types as $type)
                                                                    <div
                                                                        class="card"style="width:200px; height:120px ;margin-top:20px">

                                                                        <div class="card-body">
                                                                            <center>
                                                                                <img src="{{ asset('assets/upload/' . $type->photo) }}"
                                                                                    width="100">
                                                                            </center>
                                                                            <center>
                                                                                <p class="card-text">Photo</p>
                                                                            </center>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="boutton " style="margin-bottom: 20px">
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" onclick="verifierAcces('{{ auth()->user()->role }}')"
                                                    class="btn btn-primary">Envoyer <i
                                                        class="fa-solid fa-square-arrow-up-right"></i></button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container mt--4">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h1>Liste paiement</h1>
                                </div>
                                <table class="table table-head-bg-primary mt-4">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nom du compte</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Numero</th>
                                            <th scope="col">Photo</th>
                                            <th scope="col">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($methodes as $methode)
                                            <tr>
                                                <td>{{ $methode->nom }}</td>
                                                <td>{{ $methode->typePaiement->type }}</td>
                                                <td>{{ $methode->telephone }}</td>
                                                <td>
                                                    <img src="{{ asset('assets/upload/' . $methode->typePaiement->photo) }}"
                                                        width="50">
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <button type="button"style="margin-left: 10px"
                                                            class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#editpayModal">
                                                            <i class="fas fa-edit"></i>
                                                        </button>

                                                        <!-- Bouton qui ouvre le modal -->
                                                        <button type="button"style="margin-left: 10px"
                                                            class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#payDelete{{ $methode->id }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>

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

@if ($errors->has('type') || $errors->has('photo') )
    <script>
        // Quand la page est chargée, si erreurs => afficher le modal
        document.addEventListener('DOMContentLoaded', function () {
            let myModal = new bootstrap.Modal(document.getElementById('payementModal'));
            myModal.show();
        });
    </script>
@endif

@if ($errors->has('nom') || $errors->has('telephone'))
    <script>
        // Quand la page est chargée, si erreurs => afficher le modal
        document.addEventListener('DOMContentLoaded', function () {
            let myModal = new bootstrap.Modal(document.getElementById('editpayModal'));
            myModal.show();
        });
    </script>
@endif

