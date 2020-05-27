<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    public function allNews () {
        $news = News::query()->where('is_private', 1)->paginate(6);
        $data = [
            'news' => $news,
            'metaTitle' => 'Все новости'
        ];
        return view ('news.news', $data);
    }

    public function newsSingle (int $id) {

        $data = [
            'news' => News::find($id),
            'cats' => News::query()->find($id)->cats()->get(),
            'metaTitle' => News::find($id)->title
        ];

        return view ('news.single', $data);
    }

    public function allCats () {
        $data = [
            'cats' => Category::all(),
            'metaTitle' => 'Все категории'
        ];
        return view ('news.allCats', $data);
    }

    public function cat (int $id) {
        $news = Category::query()->find($id)->news()->where('is_private', 1)->paginate(6);
        $data = [
           'news' => $news,
           'h' => 'Категория: ' . Category::find($id)->title,
           'metaTitle' => Category::find($id)->title
         ];
         return view ('news.news', $data);
    }


}
