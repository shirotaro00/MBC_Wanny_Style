<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategorie extends Model
{
    use HasFactory;
        protected $fillable = [
        'article_id',
        'type_article_id'
    ];
    public function Article() {
    return $this->belongsTo(Article::class, 'article_id');
    }

    public function Categorie() {
    return $this->belongsTo(Categorie::class, 'type_article_id');
    }

}
