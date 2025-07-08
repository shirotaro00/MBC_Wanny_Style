@extends('pageadmin.dashbord.admin')

@section('body')
    <div class="wrapper">
        @include('partials.admin.sidebar')
        @include('partials.admin.modal.addpayement')

        <div class="main-panel">
            @include('partials.admin.header')


            <div class="container " >
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
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="numero" class="form-label">Numero</label>
                                                            <input type="text" class="form-control" id="numero"
                                                                name="telephone" placeholder="numero">
                                                        </div>
                                                        <div class="mb-3" style="height: 42px ; ">
                                                            <label for="categorie" class="form-label">Type de
                                                                paiement</label>
                                                            <select class="form-select form-control" id="categorie"
                                                                name="type">
                                                                <option value=""></option>
                                                                <option value=""></option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">

                                                        <div class="mb-3">
                                                            <div
                                                                class="card"style="width:200px; height:120px ;margin-top:20px">

                                                                <div class="card-body">
                                                                    <img src="" alt="" srcset="">
                                                                    <center>
                                                                        <p class="card-text">Photo</p>
                                                                    </center>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="boutton " style="margin-bottom: 20px">
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary">Envoyer <i
                                                        class="fa-solid fa-square-arrow-up-right"></i></button>
                                            </div>
                                        </div>
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
                                            <th scope="col">Type</th>
                                            <th scope="col">Numero</th>
                                            <th scope="col">Photo</th>
                                            <th scope="col">Action</th>


                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                        </tr>

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
