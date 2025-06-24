<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypePaiement extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'photo'
    ];
    public function MethodePaiement() {
    return $this->hasMany(MethodePaiement::class, 'type_paiement_id');
    }

}
