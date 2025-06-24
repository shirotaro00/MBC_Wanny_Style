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
        'methode_paiement_id'
    ];
    public function User() {
    return $this->belongsTo(User::class, 'user_id');
    }

    public function MethodePaiement() {
        return $this->belongsTo(MethodePaiement::class, 'methode_paiement_id');
    }

}
