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
                                        <h3 class="fw-bold mb-3" style="margin-right:400px;margin-top:10px">Historique des
                                            paiements
                                        </h3>

                                    </div>

                                    <table class="table table-head-bg-primary mt-4">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nom client</th>
                                                <th scope="col">Ref-article</th>
                                                <th scope="col">Ref-paiement</th>
                                                <th scope="col">Montant payé</th>
                                                <th scope="col">Reste a paye</th>
                                                <th scope="col">Date de paiement</th>
                                                <th scope="col">Methode de paiement</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($paiements as $paiement)
                                                @php
                                                    $commande = $paiement->commande;
                                                    $total = $commande->detailCommande->sum(
                                                        fn($d) => $d->prix_unitaire * $d->quantite,
                                                    );
                                                    $dejaPaye = $commande->paiements->sum('montant');
                                                    $reste = max($total - $dejaPaye, 0);
                                                @endphp

                                                <tr>
                                                    <td>{{ $paiement->user->nom }} {{ $paiement->user->prenom }}</td>
                                                    <td>{{ $commande->reference_commande ?? 'N/A' }}</td>
                                                    <td>{{ $paiement->Ref_paiement }}</td>
                                                    <td>{{ number_format($paiement->montant, 0, ',', ' ') }} MGA</td>
                                                    <td>{{ number_format($reste, 0, ',', ' ') }} MGA</td>
                                                    <td>{{ \Carbon\Carbon::parse($paiement->date_paiement)->format('d/m/Y') }}
                                                    </td>
                                                    <td>{{ $paiement->typePaiement->type ?? 'Inconnue' }}</td>


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
