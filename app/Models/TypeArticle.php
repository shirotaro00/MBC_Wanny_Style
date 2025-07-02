<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeArticle extends Model
{
    use HasFactory;
      protected $fillable = [
        'nom',
        'categorie_id',
    ];
public function categorie()
{
    return $this->belongsTo(Categorie::class, 'categorie_id');
}

public function ArticleCategorie()
{
    return $this->hasMany(ArticleCategorie::class, 'type_article_id');
}


}
