<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    protected $table = 'news';
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $fillable = ['title', 'content', 'is_private', 'id_source'];

    public function cats() {
        return $this->belongsToMany(Category::class, 'cat_relations', 'id_news', 'id_category');
    }

}
