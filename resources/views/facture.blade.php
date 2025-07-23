<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Facture</title>
    <style>
        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h2>Facture - Commande N°{{ $commande->id }}</h2>
    <p>Date : {{ \Carbon\Carbon::parse($commande->date_commande)->format('d/m/Y') }}</p>


    <div class="container">
        <div class="row justify-content-center" style="margin-bottom: 20px;">
            <!-- Colonne 1 : Infos commande (à gauche maintenant) -->
            <div class="col-md-5" style="background: #f8f9fa; border-radius: 8px; padding: 20px; margin-right: 10px;">
                <h5 class="text-center mb-3">Détails de la Commande</h5>
                <p><strong>Date de livraison :</strong> {{ $commande->date_livraison }}</p>
                <p><strong>Réf. Article :</strong> {{ $commande->reference_commande }}</p>
                @if ($commande->paiements->isNotEmpty())
                    @foreach ($commande->paiements as $pay)
                        <p><strong>Réf. Paiement :</strong> {{ $pay->Ref_paiement }}</p>
                    @endforeach
                @else
                    <p><strong>Réf. Paiement :</strong> Aucun paiement trouvé.</p>
                @endif
            </div>

            <!-- Colonne 2 : Infos client (à droite maintenant) -->
            <div class="col-md-5" style="background: #f8f9fa; border-radius: 8px; padding: 20px;">
                <h5 class="text-center mb-3">Informations Client</h5>
                <p><strong>Nom :</strong> {{ $commande->user?->nom ?? 'Inconnu' }}</p>
                <p><strong>Prénom :</strong> {{ $commande->user?->prenom ?? 'Inconnu' }}</p>
                <p><strong>Adresse :</strong> {{ $commande->user?->adresse ?? 'Inconnu' }}</p>
                <p><strong>Téléphone :</strong> {{ $commande->user?->telephone ?? 'Inconnu' }}</p>
            </div>
        </div>
    </div>



    <h4>Articles</h4>
    <table>
        <thead>
            <tr>
                <th>Nom article</th>
                <th>Quantité</th>
                <th>Categorie</th>
                <th>Type</th>
                <th>Taille</th>
                <th>Couleur</th>
                <th>Prix unitaire</th>

            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach ($commande->DetailCommande as $detail)
                @php $sousTotal = $detail->prix_unitaire * $detail->quantite; @endphp
                <tr>
                    <td>{{ $detail->article->nom ?? 'Article supprimé' }}</td>
                    <td>{{ $detail->quantite }}</td>
                    <td>{{ $detail->article->categorie ?? '-' }}</td>
                    <td>{{ $detail->TypeArticle?->type ?? '-' }}</td>
                    <td>{{ $detail->article->taille ?? '-' }}</td>
                    <td>{{ $detail->detailArticle?->couleur ?? '-' }}</td>
                    <td>{{ $detail->prix_unitaire }} MGA</td>
                </tr>
                @php $total += $sousTotal; @endphp
            @endforeach




        </tbody>
    </table>
    <br>

    <p style="text-align: right;"><strong>Montant total à payer : {{ number_format($total, 0, ',', ' ') }}</strong> MGA
    </p>
    @php
        $totalPaye = $commande->paiements->sum('montant');
        $reste = max($total - $totalPaye, 0);
    @endphp
    <p style="text-align: right;"><strong>Montant déjà payé : {{ number_format($totalPaye, 0, ',', ' ') }}</strong>MGA
    </p>
    <p style="text-align: right;"><strong>Reste à payer : {{ number_format($reste, 0, ',', ' ') }}</strong>MGA
    </p>

</body>

</html>
