<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'cats';
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $fillable = ['title', 'description'];

    public function news () {
        return $this->belongsToMany(News::class, 'cat_relations', 'id_category', 'id_news');
    }
}
