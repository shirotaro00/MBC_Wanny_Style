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
    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }

    public function typeArticle()
    {
        return $this->belongsTo(TypeArticle::class, 'type_article_id');
    }
}
