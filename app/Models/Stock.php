<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantite',
        'date_stock',
        'article_id'
    ];


    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
