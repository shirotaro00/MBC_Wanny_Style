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
                                        <h3 class="fw-bold mb-3" style="margin-right:400px;margin-top:10px">liste article
                                        </h3>

                                    </div>

                                    <table class="table table-head-bg-primary mt-4">
                                        <thead>
                                            <tr>

                                                <th scope="col">nom</th>
                                                <th scope="col">prix</th>
                                                <th scope="col">type</th>
                                                <th scope="col">taille</th>
                                                <th scope="col">couleur</th>
                                                <th scope="col">description</th>
                                                <th scope="col">photo</th>
                                                <th scope="col">Action</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($articles as $article)
                                                @foreach ($article->DetailArticle as $detail)
                                                    <tr>
                                                        <td>{{ $article->nom }}</td>
                                                        <td>{{ $article->prix }}</td>
                                                        <td>{{ $article->TypeArticle->nom }}</td>
                                                        <td>{{ $detail->taille }}</td>
                                                        <td>{{ $detail->couleur }}</td>
                                                        <td>{{ $detail->description }}</td>
                                                        <td>
                                                             <img src="{{ asset('assets/upload/'.$article->photo) }}" alt="" width="50px" height="50px" class="rounded-circle">
                                                        </td>
                                                        <td>
                                                              <a href="{{route("admin.editarticle")}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                              <a href="" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
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
