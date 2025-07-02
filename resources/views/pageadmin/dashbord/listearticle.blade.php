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
                          <th scope="col">photo</th>
                          <th scope="col">type</th>
                           <th scope="col">taille</th>
                          <th scope="col">couleur</th>
                          <th scope="col">Action</th>


                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td colspan="2">Larry the Bird</td>
                          <td>@twitter</td>
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
