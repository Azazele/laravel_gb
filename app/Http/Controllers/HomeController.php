<?php

namespace App\Http\Controllers;

use App\NewsModel;
use Illuminate\Http\Request;
use App\Http\Controllers\News\NewsController;


class HomeController extends Controller
{

    public function index()
    {
        $newsModel = new NewsModel();
        $news = $newsModel->getNewsByCatId(1);

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
