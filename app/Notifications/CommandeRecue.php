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


     return (new MailMessage)
        ->subject('Votre commande a été validée !')
        ->view('email.Emailadmin', [

            'gerant' => $notifiable,
            'client' => $notifiable,
            'commande' => $this->commande
        ]);
}



}
