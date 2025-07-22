<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Commande passée</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f6f6f6; padding: 20px;">
    <table width="100%"
        style="max-width: 600px; margin: auto; background-color: white; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <tr>
            <td style="text-align: center;">
                <h2 style="color: #4CAF50;"> Une nouvelle commande a été passée !</h2>
                <p>Bonjour {{ $gerant->nom }},</p>
                <p>Nous avons le plaisir de vous informer qu'une commande a été effectuée <br>
                <h4>Nom client : {{ $commande->user->nom }} </h4>

                <h4><strong>Date de commande :</strong> {{ $commande->created_at->format('d/m/Y ') }}</h4>

                <h4>Date livraison :  {{ $commande->date_livraison }}</h4>

                <h4>Ref-article :  {{ $commande->reference_commande }}</h4>

            </td>
        </tr>

        <tr>
            <td>
               <h4>Détails de la commande :</h4>
                <ul>
                    @foreach ($commande->DetailCommande as $detail)
                        <li>
                            {{ $detail->article->nom ?? 'Article supprimé' }}
                        </li>
                        <li>Qté: {{ $detail->quantite }}</li>
                        <li>Type: {{ $detail->TypeArticle->type }}</li>
                        <li>Taille: {{ $detail->article->taille }}</li>
                        <li>Couleur: {{ $detail->detailArticle->couleur }}</li>
                        <li>Prix unitaire: {{ number_format($detail->article->prix) }} MGA</li>
                    @endforeach
                    <li><strong>Montant total :</strong> {{ number_format($commande->prix_total) }} MGA</li>
                    <li><strong>Statut :</strong> {{ ucfirst($commande->statut) }}</li>
                </ul>
            </td>

        </tr>
        <tr>
    </table>
</body>

</html>
