<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom'
    ];
    // public function ArticleCategorie()
    // {
    //     return $this->hasMany(ArticleCategorie::class, 'type_article_id');
    // }
    public function TypeArticle()
    {
        return $this->hasMany(TypeArticle::class, 'categorie_id');
    }
}
