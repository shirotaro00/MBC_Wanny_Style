@extends('pageadmin.dashbord.admin')

@section('body')
    <div class="wrapper">
        @include('partials.admin.sidebar')
        @include('partials.admin.modal.addpayement')

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
                                        <h3 class="fw-bold mb-3" style="margin-right:400px;margin-top:10px">Methode payement
                                        </h3>

                                    </div>
                                    <div class="d-flex justify-content-end gap-2">

                                        <button class="btn btn-primary" style="margin: 5px" data-bs-toggle="modal"
                                            data-bs-target="#payementModal">Ajout methode de payement</button>

                                    </div>
                                    <table class="table table-head-bg-primary mt-4">
                                        <thead>
                                            <tr>
                                                <th scope="col">Type de payement</th>
                                                <th scope="col">Numero</th>
                                                <th scope="col">Photo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                               @foreach ($methodes as $m )
                                                    <tr>
                                                    <td>{{ $m->type }}</td>
                                                    <td>{{ $m->telephone }}</td>
                                                    <td><img src="{{ asset('assets/upload/' . $m->photo) }}"
                                                                    width="50"</td>

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
