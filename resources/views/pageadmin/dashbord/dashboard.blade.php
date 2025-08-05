@extends('pageadmin.dashbord.admin')

@section('body')
    <div class="wrapper">
        @include('partials.admin.sidebar')

        <div class="main-panel" style="background-color: #ffff">
            @include('partials.admin.header')

            <div class="container" style="background-color: #ffff">
                <div class="page-inner">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                        <div>
                            <h3 class="fw-bold mb-3">Tableau de bord</h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="fas fa-wallet text-success"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">article vendu/j</p>
                                                <h4 class="card-title">{{ $articlesVendusJour }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="fas fa-pie-chart text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Nombre clients</p>
                                                <h4 class="card-title">{{ $nombreClients }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="fas fa-close text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Stock</p>
                                                <h4 class="card-title">23</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="fa-brands fa-twitter text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Stock</p>
                                                <h4 class="card-title">+45K</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Les articles vendues</h4>
                                </div>
                                <div class="card-body">
                                    <form method="GET" action="{{ route('admin.dashboard') }}"
                                        class="mb-4 d-flex align-items-center gap-2" style="margin-left: 27%">
                                        <label for="mois" class="me-2"></label>
                                        <select name="mois" id="mois"
                                            class="w-auto px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            <option value="">Sélectionner un mois</option>
                                            @php
                                                $moisFr = [
                                                    1 => 'Janvier',
                                                    2 => 'Février',
                                                    3 => 'Mars',
                                                    4 => 'Avril',
                                                    5 => 'Mai',
                                                    6 => 'Juin',
                                                    7 => 'Juillet',
                                                    8 => 'Août',
                                                    9 => 'Septembre',
                                                    10 => 'Octobre',
                                                    11 => 'Novembre',
                                                    12 => 'Décembre',
                                                ];
                                            @endphp
                                            @for ($m = 1; $m <= 12; $m++)
                                                <option value="{{ $m }}"
                                                    @if ($m == $mois)  @endif>
                                                    {{ $moisFr[$m] }}
                                                </option>
                                            @endfor
                                        </select>
                                        <label for="annee" class="ms-3 me-2"
                                            style="margin-right: 5px;margin-left: 20px"></label>
                                        <select name="annee" id="annee"
                                            class="w-auto px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            <option value="">Sélectionner une annee</option>
                                            @for ($a = date('Y') - 3; $a <= date('Y') + 1; $a++)
                                                <option value="{{ $a }}"
                                                    @if ($a == $annee)  @endif>{{ $a }}
                                                </option>
                                            @endfor
                                        </select>
                                        <button type="submit" class="btn text-white"
                                            style="margin-left: 12px; background-color:#D77F27; width: 110px;">Filtrer</button>
                                    </form>
                                    <canvas id="commandeChart" width="1000" height="400"></canvas>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Inventaires stocks d'articles</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Détail de l'article</th>
                                                    <th>Stock initial</th>
                                                    <th>Stock sortant</th>
                                                    <th>Stock restant</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($inventaires as $inv)
                                                    <tr>
                                                        <td>{{ $inv->article->nom ?? '-' }} /
                                                            @if (isset($inv->article->detailArticle))
                                                                <small>{{ $inv->article->detailArticle->couleur ?? '' }}</small>
                                                            @endif /
                                                            @if (isset($inv->article))
                                                                <small>{{ $inv->article->taille ?? '' }}</small>
                                                            @endif
                                                        </td>
                                                        <td>{{ $inv->stock_initial ?? 0 }}</td>
                                                        <td>{{ $inv->stock_sortant ?? 0 }}</td>
                                                        <td>{{ $inv->stock_restant ?? 0 }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center">Aucun stock trouvé</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('commandeChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($labels) !!},
                    datasets: [{
                        label: 'Articles vendus par semaine',
                        data: {!! json_encode($data) !!},
                        backgroundColor: '#0BA883',
                        borderColor: '#0BA883',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.3
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true
                        }
                    },
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
                                text: 'Articles vendus'
                            }
                        }
                    }
                }
            });
        </script>
    @endsection
