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
                                        <h3 class="fw-bold mb-3" style="margin-right:400px;margin-top:10px">Gestion
                                            utilisateur
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
                                                <th scope="col">Role</th>
                                                <th scope="col">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($utilisateurs as $user)
                                            @if ($user->role == 3)
                                                <tr>
                                                    <td> {{ $user->nom }} </td>
                                                    <td>{{ $user->prenom }}</td>
                                                    <td>{{ $user->telephone }}</td>
                                                    <td> {{ $user->adresse }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        <form action="{{ route('admin.utilisateurG.update', $user->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="mb-3" style="height: 42px ; ">

                                                                <select class="form-select form-control" id="role"
                                                                    name="role">
                                                                    <option value="3"
                                                                        {{ $user->role == '3' ? 'selected' : '' }}>Lecteur
                                                                    </option>
                                                                    <option value="6"
                                                                        {{ $user->role == '6' ? 'selected' : '' }}>Editeur
                                                                    </option>

                                                                </select>
                                                            </div>
                                                    </td>

                                                    <td>
                                                        <div class="d-flex gap-2">
                                                            <button type="submit" class="btn btn-secondary"> <i
                                                                    class="fas fa-edit"></i> Modifier</button>

                                                            <!-- Bouton qui ouvre le modal -->
                                                            <button type="button"style="margin-left: 10px"
                                                                class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                                data-bs-target="#modalDelete{{ $user->id }}">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </form>
                                                @endif
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
