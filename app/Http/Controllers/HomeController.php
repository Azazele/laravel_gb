<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\News\NewsController;


class HomeController extends Controller
{

    public function index()
    {
        $newsModel = new News();
        $news = Category::query()->find(1)->news()->get();

        $domain = $_SERVER['SERVER_NAME'];
        $desc = ' - сайт агрегатор каких-то данных. Приветсвуем вас!';

        $data = [
            'domain' => $domain,
            'desc' => $desc,
            'news' => $news,
            'metaTitle' => 'Главная'
        ];

        return view('main', $data);
    }
}
