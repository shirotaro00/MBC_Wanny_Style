@extends("pageadmin.dashbord.admin")

@section('body')
<div class="wrapper">
    @include('partials.admin.sidebar')

    <div class="main-panel">
        @include('partials.admin.header')


        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Ajout article</h3>

            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Form Elements</div>
                  </div>

                  <div class="card-action">
                    <button class="btn btn-success">Submit</button>
                    <button class="btn btn-danger">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
