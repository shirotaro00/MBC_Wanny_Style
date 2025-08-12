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

                                    <div class="d-flex justify-content-end gap-2">
                                        <h3 class="fw-bold mb-3" style="margin-right:400px;margin-top:10px">Gestion
                                            utilisateur
                                        </h3>

                                    </div>

                                    <table class="table table-head mt-4">
                                        <thead style="background-color:#E6EAC9;">
                                            <tr>
                                                <th scope="col">Nom </th>
                                                <th scope="col">Prenom</th>
                                                <th scope="col">Telephone</th>
                                                <th scope="col">Adresse</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Role</th>
                                                <th scope="col">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($utilisateurs as $user)
                                                <tr>
                                                    <td>{{ $user->nom }}</td>
                                                    <td>{{ $user->prenom }}</td>
                                                    <td>{{ $user->telephone }}</td>
                                                    <td>{{ $user->adresse }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        <form action="{{ route('admin.utilisateurG.update', $user->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-3" style="height: 42px; padding-top:10px;">
                                                                <select class="form-select form-control" name="role">
                                                                    <option value="3"
                                                                        {{ $user->role == 3 ? 'selected' : '' }}>Lecteur
                                                                    </option>
                                                                    <option value="6"
                                                                        {{ $user->role == 6 ? 'selected' : '' }}>Editeur
                                                                    </option>
                                                                </select>
                                                            </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex gap-2">
                                                            <button type="submit" class="btn text-white"
                                                                style="background-color: #D77F27">
                                                                <i class="fas fa-edit"></i> Modifier
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </form>
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
