<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCommande extends Model
{
    use HasFactory;
     protected $fillable = [
        'quantite',
        'prix_unitaire',
        'commande_id'
    ];
}
