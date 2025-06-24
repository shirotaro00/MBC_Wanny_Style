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
        'Ref_paiement',
        'user_id'
    ];
}
