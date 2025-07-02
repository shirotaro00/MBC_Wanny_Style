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

public function detailArticle()
{
    return $this->hasMany(DetailArticle::class, 'article_id');
}

public function DetailCommande()
{
    return $this->hasMany(DetailArticle::class, 'article_id');
}


}
