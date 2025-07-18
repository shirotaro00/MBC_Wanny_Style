<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailArticle extends Model
{
    use HasFactory;
    protected $fillable = [
        'couleur',
    ];

    public function Stock()
    {
        return $this->hasOne(Stock::class, 'detail_article_id');
    }

    public function article()
    {
        return $this->hasMany(Article::class,'article_id');
    }
    public function DetailCommande()
    {
        return $this->hasMany(DetailCommande::class, 'detail_article_id');
    }

}
