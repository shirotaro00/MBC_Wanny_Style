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
    public function TypeArticle()
    {
        return $this->hasOneThrough(
            TypeArticle::class,
            Article::class,
            'id',
            'id',
            'article_id',
            'type_article_id'
        );
    }
    public function detailArticle()
    {
        return $this->hasOneThrough(
            DetailArticle::class,
            Article::class,
            'id',
            'id',
            'article_id',
            'detail_article_id'
        );
    }
}
