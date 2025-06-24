<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeArticle extends Model
{
    use HasFactory;
      protected $fillable = [
        'nom'
    ];
    public function Article() {
    return $this->hasMany(Article::class, 'type_article_id');
    }

}
