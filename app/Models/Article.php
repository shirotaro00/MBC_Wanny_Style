<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
      protected $fillable = [
        'nom',
        'prix',
        'photo',
        'type_article_id'
    ];
    public function TypeArticle() {
    return $this->belongsTo(TypeArticle::class, 'type_article_id');
    }

    public function ArticleCategorie() {
    return $this->hasMany(ArticleCategorie::class, 'article_id');
    }

    public function DetailArticle() {
    return $this->hasMany(DetailArticle::class, 'article_id');
    }

}
