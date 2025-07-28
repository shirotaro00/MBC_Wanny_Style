@extends('pageadmin.dashbord.admin')

@section('body')
<div class="wrapper">
    @include('partials.admin.sidebar')

    <div class="main-panel">
        @include('partials.admin.header')

        <div class="container">
            <div class="page-inner">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                    <div>
                        <h3 class="fw-bold mb-3">Tableau de bord</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
 <div class="card-body">

<p >Article vendue</p><i class="fa-solid fa-cart-shopping"></i>
                            </div>
                        </div>
                    </div>

                           <div class="col-md-3">
                        <div class="card">
 <div class="card-body">

<p >Article vendue</p><i class="fa-solid fa-cart-shopping"></i>
                            </div>
                        </div>
                    </div>

                           <div class="col-md-3">
                        <div class="card">
 <div class="card-body">

<p >Article vendue</p><i class="fa-solid fa-cart-shopping"></i>
                            </div>
                        </div>
                    </div>

                           <div class="col-md-3">
                        <div class="card">
 <div class="card-body">

<p >Article vendue</p><i class="fa-solid fa-cart-shopping"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Commandes validées par semaine</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="commandeChart" width="1000" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('commandeChart').getContext('2d');

    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: [{
                label: 'Commandes validées',
                data: {!! json_encode($data) !!},
                backgroundColor: 'rgba(75, 192, 192, 0.7)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
options: {
    responsive: true,
    scales: {
        y: {
            beginAtZero: true,
            ticks: {
                stepSize: 1,
                precision: 0,
                callback: function(value) {
                    if (Number.isInteger(value)) {
                        return value;
                    }
                }
            },
            title: {
                display: true,
                text: 'Nombre de commandes validées'
            }
        }
    }
}
    });
</script>
@endsection
