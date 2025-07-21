<?php

namespace App\Notifications;

use App\Models\Commande;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CommandeRecue extends Notification
{
    use Queueable;

       protected $commande;
    public function __construct(Commande $commande)
    {
          $this->commande = $commande;
    }



    public function via(object $notifiable): array
    {
        return ['mail'];
    }


public function toMail(object $notifiable): MailMessage
{
    $details = [];
    foreach ($this->commande->DetailCommande as $detail) {
        $articleNom = $detail->article->nom ?? 'Article supprimé';
        $quantite = $detail->quantite;
        $prix = $detail->article->prix ?? '-';
        $details[] = " Nom article : $articleNom, Qté: $quantite ,Prix unitaire: $prix MGA";
    }
    $detailsLine = implode(' | ', $details);

    return (new MailMessage)
        ->subject('Nouvelle commande reçue')
        ->greeting('Bonjour Gérant')
        ->line('Une nouvelle commande a été passée.')
        ->line('Nom du client : ' . e($this->commande->user->nom))
        ->line('Montant total : ' . e($this->commande->prix_total) . ' MGA')
        ->line('Détails des articles : ' . $detailsLine)
        ->line('Merci de vérifier cette commande rapidement.');
}



}
