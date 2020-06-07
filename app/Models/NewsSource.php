<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsSource extends Model
{
    protected $table = 'news_sources';
    protected $fillable = ['title', 'link', 'data_link', 'description'];
    public $timestamps = false;
}
