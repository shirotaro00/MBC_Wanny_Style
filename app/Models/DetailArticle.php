<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailArticle extends Model
{
    use HasFactory;
        protected $fillable = [
        'taille',
        'couleur',
        'description',
        'article_id'
    ];
    public function Article() {
    return $this->belongsTo(Article::class, 'article_id');
    }

    public function Stock() {
        return $this->hasOne(Stock::class, 'detail_article_id');
    }

}
