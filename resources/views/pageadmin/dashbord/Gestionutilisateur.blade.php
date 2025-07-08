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

                                            </tr>
                                        </thead>
                                        <tbody>
                              @foreach ($utilisateurs as $user)
                                    <tr>
                                                <td> {{$user->nom}}  </td>
                                                <td>{{$user->prenom}}</td>
                                                <td>{{$user->telephone}}</td>
                                                <td> {{$user->adresse}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>
                                                    <form action="{{route('admin.utilisateurG.update',$user->id)}}" method="post">
                                                        @csrf
                                                        <div class="mb-3" style="height: 42px ; ">

                                                            <select class="form-select form-control" id="role"
                                                                name="role">
                                                                <option value="3" {{$user->role =='3'? 'selected' : ''}} >Lecteur</option>
                                                                <option value="6" {{$user->role =='6'? 'selected' : ''}} >Editeur</option>

                                                            </select>
                                                        </div>
                                                        <button type="submit">Modifier</button>
                                                    </form>
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
