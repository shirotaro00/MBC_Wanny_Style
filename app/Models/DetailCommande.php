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
        'article_id',
        'commande_id'
    ];
    public function Commande()
    {
        return $this->belongsTo(Commande::class, 'commande_id');
    }

    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
