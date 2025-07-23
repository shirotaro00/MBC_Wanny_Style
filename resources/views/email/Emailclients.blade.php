<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Commande validée</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f6f6f6; padding: 20px;">
    <table width="100%" style="max-width: 600px; margin: auto; background-color: white; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <tr>
            <td style="text-align: center;">
                <h2 style="color: #4CAF50;">Commande validée !</h2>
                <p>Bonjour {{ $client->nom }},</p>
                <p>Nous avons le plaisir de vous informer que votre commande a été validée par notre gérant.</p>
                <p>Vous devez payer 50% du montant total.</p>
                <p>Voici les détails de votre commande :</p>
            </td>
        </tr>
        <tr>
            <td>
                <h4>Détails de la commande :</h4>
                <ul style="padding-left: 18px;">
                    <li><strong>Date commande :</strong> {{ $commande->created_at->format('d/m/Y') }}</li>
                    <li><strong>Date livraison :</strong> {{ $commande->date_livraison }}</li>
                    <li><strong>Statut :</strong> {{ ucfirst($commande->statut) }}</li>
                </ul>
            </td>
        </tr>
        <tr>
            <td>
                <h4>Articles commandés :</h4>
                <table width="100%" border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; font-size: 15px;">
                    <thead style="background: #f8f9fa;">
                        <tr>
                            <th>Nom article</th>
                            <th>Qté</th>
                            <th>Type</th>
                            <th>Taille</th>
                            <th>Couleur</th>
                            <th>Prix unitaire</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($commande->DetailCommande as $detail)
                            <tr>
                                <td>{{ $detail->article->nom ?? 'Article supprimé' }}</td>
                                <td>{{ $detail->quantite }}</td>
                                <td>{{ $detail->TypeArticle->type ?? '-' }}</td>
                                <td>{{ $detail->article->taille ?? '-' }}</td>
                                <td>{{ $detail->detailArticle->couleur ?? '-' }}</td>
                                <td>{{ number_format($detail->article->prix) }} MGA</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p style="text-align: right; margin-top: 10px;">
                    <strong>Montant total à payer :</strong> {{ number_format($commande->prix_total) }} MGA
                </p>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 30px;">
                <p style="color: #555;">Merci de votre confiance.<br>L'équipe de Wanny-style</p>
            </td>
        </tr>
    </table>
</body>
</html>
