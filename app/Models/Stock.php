<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantite',
        'detail_article_id'
    ];
    public function DetailArticle() {
    return $this->belongsTo(DetailArticle::class, 'detail_article_id');
    }

}
