<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategorie extends Model
{
    use HasFactory;
        protected $fillable = [
        'Article_id',
        'TypeArticle_id'
    ];
}
