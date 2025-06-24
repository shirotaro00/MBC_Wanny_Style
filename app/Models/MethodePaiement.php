<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MethodePaiement extends Model
{
    use HasFactory;
    protected $fillable = [
        'telephone',
        'efface',
        'type_paiement_id'
    ];
    public function TypePaiement() {
    return $this->belongsTo(TypePaiement::class, 'type_paiement_id');
    }

    public function Paiement() {
        return $this->hasMany(Paiement::class, 'methode_paiement_id');
    }

}
