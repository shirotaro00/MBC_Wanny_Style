<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;
    protected $fillable = [
        'montant',
        'Ref_paiement',
        'date_paiement',
        'user_id',
        'commande_id',
        'methode_paiement_id'
    ];
    public function user() {
    return $this->belongsTo(User::class, 'user_id');
    }

     public function commande() {
    return $this->belongsTo(Commande::class, 'commande_id');
    }

    public function methodePaiement() {
        return $this->belongsTo(MethodePaiement::class, 'methode_paiement_id');
    }
    public function typePaiement()
{
    return $this->hasOneThrough(
        TypePaiement::class,        // Le modèle final
        MethodePaiement::class,     // Le modèle intermédiaire
        'id',                       // Clé dans methode_paiements (vers type_paiement_id)
        'id',                       // Clé dans type_paiements
        'methode_paiement_id',      // Clé dans paiements
        'type_paiement_id'          // Clé dans methode_paiements
    );
}


}
