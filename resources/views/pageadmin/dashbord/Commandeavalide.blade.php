@extends('pageadmin.dashbord.admin')

@section('body')
    @include('partials.admin.modal.type')
    @include('partials.admin.modal.detail')

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
                                    <center>
                                        <h3>Commande à valider</h3>
                                    </center>

                                </div>

                                <div class="row row-cols-1 row-cols-md-1 g-4 justify-content-center"
                                    style="margin-top: 20px; padding-left: 30px; padding-right: 30px; ">



                                    @foreach ($commandes as $commande)
                                        <div class="col mb-4">
                                            <div class="card h-100 "
                                                style="margin-left: 10px; margin-right: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.25);">
                                                <div class="card-body">
                                                    <h5 class="card-title">Commande le:
                                                        {{ \Carbon\Carbon::parse($commande->date_commande)->format('d/m/Y') }}
                                                    </h5>


                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p>Nom : {{ $commande->user?->nom ?? 'Inconnu' }} </p>
                                                            <p>Prenom :
                                                                {{ $commande->user?->prenom ?? 'Inconnu' }} </p>
                                                            <p>Adresse :
                                                                {{ $commande->user?->adresse ?? 'Inconnu' }} </p>
                                                            <p>Telephone :
                                                                {{ $commande->user?->telephone ?? 'Inconnu' }}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>Date de livraison : {{ $commande->date_livraison }}
                                                            </p>
                                                            <p>Ref-article : {{ $commande->reference_commande }}
                                                            </p>
                                                            <p>Statut : {{ ucfirst($commande->statut) }}</p>
                                                        </div>
                                                    </div>

                                                    <div class="table-responsive ">
                                                        <table class="table  ">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Nom article</th>
                                                                    <th scope="col">Quantité</th>
                                                                    <th scope="col">Categorie</th>
                                                                    <th scope="col">Type</th>
                                                                    <th scope="col">Taille</th>
                                                                    <th scope="col">Couleur</th>
                                                                    <th scope="col">Prix unitaire</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @php $total = 0; @endphp
                                                                @foreach ($commande->DetailCommande as $detail)
                                                                    @php $sousTotal = $detail->prix_unitaire * $detail->quantite; @endphp
                                                                    <tr>
                                                                        <td>{{ $detail->article->nom ?? 'Article supprimé' }}
                                                                        </td>
                                                                        <td>{{ $detail->quantite }}</td>
                                                                        <td>{{ $detail->article->categorie ?? '-' }}
                                                                        </td>
                                                                        <td>{{ $detail->TypeArticle?->type ?? '-' }}
                                                                        </td>
                                                                        <td>{{ $detail->article->taille ?? '-' }}
                                                                        </td>
                                                                        <td>{{ $detail->detailArticle?->couleur ?? '-' }}
                                                                        </td>
                                                                        <td>{{ $detail->prix_unitaire }}</td>

                                                                    </tr>
                                                                    @php $total += $sousTotal; @endphp
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        <br>

                                                        <p style="text-align: right;"><strong>Montant total :
                                                                {{ number_format($total, 0, ',', ' ') }}</strong> MGA</p>
                                                    </div>
                                                    <div class="d-flex justify-content-end mt-5">
                                                        <form action="{{ route('commande.valider', $commande->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary"><i
                                                                    class="fa fa-check"></i> Valider</button>
                                                        </form>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
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
