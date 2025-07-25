<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeArticle extends Model
{
    use HasFactory;
      protected $fillable = [
        'type',
    ];

public function ArticleCategorie()
{
    return $this->hasMany(ArticleCategorie::class, 'type_article_id');
}
public function article()
{
    return $this->hasMany(Article::class,'article_id');
}
public function DetailCommande()
{
    return $this->hasMany(DetailCommande::class, 'type_article_id');

}

}
