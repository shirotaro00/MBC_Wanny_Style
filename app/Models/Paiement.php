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
        'MethodePaiement'
    ];
}
