<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
      protected $fillable = [
        'nom',
        'categorie',
        'prix',
        'quantite',
        'description',
        'photo',
        'taille',
        'date_ajout',
        'type_article_id',
        'detail_article_id'
    ];

public function typeArticle()
{
    return $this->belongsTo(TypeArticle::class,'type_article_id');
}

public function detailArticle()
{
    return $this->belongsTo(DetailArticle::class,'detail_article_id');
}


public function DetailCommande()
{
    return $this->hasMany(DetailArticle::class, 'article_id');
}


}
