<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_commande',
        'prix_total',
        'statut',
        'reference_commande',
        'date_livraison',
        'user_id'
    ];
    public function User() {
    return $this->belongsTo(User::class, 'user_id');
    }

    public function DetailCommande() {
        return $this->hasMany(DetailCommande::class, 'commande_id');
    }

     public function paiements() {
    return $this->hasMany(Paiement::class, 'commande_id');
    }

}
