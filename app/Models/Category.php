<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Category extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name', 'description',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
