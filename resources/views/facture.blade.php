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

    <h4>Client</h4>
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
            <p>Ref-paiement : {{ $commande->Ref_paiement }} </p>
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
                <th>Total</th>
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
                    <td>{{ $detail->prix_unitaire }} MGA</td>
                    <td>{{ number_format($sousTotal, 0, ',', ' ') }}
                        MGA</td>
                </tr>
                @php $total += $sousTotal; @endphp
            @endforeach
        </tbody>
    </table>
</body>

</html>
