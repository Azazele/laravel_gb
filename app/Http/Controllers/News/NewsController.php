<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\NewsModel;

class NewsController extends Controller
{
    public function allNews () {
        $newsModel = new NewsModel();
        $news = $newsModel->getNews();

        $data = [
            'news' => $news,
            'metaTitle' => 'Все новости'
        ];
        return view ('news.news', $data);
    }

    public function newsSingle (int $id) {
        $newsModel = new NewsModel();
        $news = $newsModel->getNewsById($id);
        $cats = $newsModel->getCatsByNewsId($id);

        $data = [
            'news' => $news,
            'cats' => $cats,
            'metaTitle' => $news->title
        ];
        return view ('news.single', $data);
    }

    public function allCats () {
        $newsModel = new NewsModel();
        $cats = $newsModel->getCats();

        $data = [
            'cats' => $cats,
            'metaTitle' => 'Все категории'
        ];
        return view ('news.allCats', $data);
    }

    public function cat (int $id) {
        $newsModel = new NewsModel();
        $news = $newsModel->getNewsByCatId($id);
        $cat_name = $newsModel->getCatByID($id)->title;

        $data = [
           'news' => $news,
           'h' => 'Категория: ' . $cat_name,
           'metaTitle' => $cat_name
         ];
         return view ('news.news', $data);
    }


}
