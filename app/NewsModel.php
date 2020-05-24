<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NewsModel extends Model
{
    const NEWS_COLUMNS = ['id', 'title', 'content', 'img', 'created_at', 'is_private', 'id_source'];
    const CATS_COLUMNS = ['id', 'title', 'description', 'created_at'];
    const NEWS_JOIN_CATS_COLUMNS = [
        'news.id as id',
        'news.img as img',
        'news.title as title',
        'news.content as content',
        'news.created_at as created_at',
        'cats.title as cat_name'
    ];


    public function getNews ()
    {
        return DB::table('news')
            ->select(self::NEWS_COLUMNS)->get();
    }

    public function getNewsById (int $id)
    {
        return DB::table('news')
            ->select(self::NEWS_COLUMNS)->find($id);
    }

    public function getNewsByCatId (int $id)
    {
        return DB::table('news')
            ->join('cat_relations', 'news.id', '=', 'cat_relations.id_news')
            ->join('cats', 'cats.id', '=', 'cat_relations.id_category')
            ->select(self::NEWS_JOIN_CATS_COLUMNS)
            ->where('cat_relations.id_category', $id)
            ->get();
    }

    public function getCats ()
    {
        return DB::table('cats')
            ->select(self::CATS_COLUMNS)->get();
    }

    public function getCatByID (int $id)
    {
        return DB::table('cats')->select(self::CATS_COLUMNS)
            ->find($id);
    }

    public function getCatsByNewsId (int $id)
    {
        return DB::table('cats')
            ->join('cat_relations', 'cats.id', '=', 'cat_relations.id_category')
            ->select('cats.title as name', 'cats.id as id')
            ->where('cat_relations.id_news', $id)
            ->get();
    }
}
