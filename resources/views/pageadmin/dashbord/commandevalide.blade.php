@extends('pageadmin.dashbord.admin')

@section('body')

  <div class="wrapper">
    @include('partials.admin.sidebar')

    <div class="main-panel">
        @include('partials.admin.header')

        <div class="container" style="background-color: #ffff">
            <div class="page-inner">
                <div class="page-header"></div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Commande validée</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Date commande</th>
                                                <th>Nom / Prénom</th>
                                                <th>Référence</th>
                                                <th>Statut paiement</th>
                                                <th>Montant total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($commandes as $commande)
                                                @php
                                                    $total = 0;
                                                    foreach ($commande->DetailCommande as $detail) {
                                                        $total += $detail->prix_unitaire * $detail->quantite;
                                                    }
                                                @endphp
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($commande->date_commande)->format('d/m/Y') }}</td>
                                                    <td>{{ $commande->user?->nom ?? 'Inconnu' }} / {{ $commande->user?->prenom ?? 'Inconnu' }}</td>
                                                    <td>{{ $commande->reference_commande }}</td>
                                                    <td>{{ $commande->statut_paiement }}</td>
                                                    <td>{{ number_format($total, 0, ',', ' ') }} MGA</td>
                                                    <td>
                                                        <form action="{{ route('facture.generer', $commande->id) }}" method="GET" target="_blank">
                                                            @csrf
                                                            <button type="submit" class="btn text-white" style="width: 120px;background-color: #DDA233">
                                                                <i class="fa fa-download mr-1"></i>
                                                                Facture
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @if($commandes->isEmpty())
                                        <div class="alert alert-info text-center mt-3">
                                            Aucune commande validée pour le moment.
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
