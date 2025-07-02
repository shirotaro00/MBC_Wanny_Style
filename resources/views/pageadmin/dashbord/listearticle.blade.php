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

                                                <th scope="col">Catégorie</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Article</th>
                                                <th scope="col">Prix</th>
                                                <th scope="col">Photo</th>
                                                <th scope="col">Taille</th>
                                                <th scope="col">Couleur</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Action</th>


                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($articleCategories as $ac)
                                                @foreach ($ac->article->detailArticle as $detail)
                                                    <tr>
                                                        <td>{{ $ac->typeArticle->categorie->nom ?? 'N/A' }}</td>
                                                        <td>{{ $ac->typeArticle->nom }}</td>
                                                        <td>{{ $ac->article->nom }}</td>
                                                        <td>{{ $ac->article->prix }}</td>
                                                        <td>
                                                            <img src="{{ asset('assets/upload/' . $ac->article->photo) }}"
                                                                width="50" height="50">
                                                        </td>
                                                        <td>{{ $detail->taille }}</td>
                                                        <td>{{ $detail->couleur }}</td>
                                                        <td>{{ $detail->description }}</td>
                                                        <td>

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
