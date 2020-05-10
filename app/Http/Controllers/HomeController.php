<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\News\NewsController;


class HomeController extends Controller
{

    public function index() {
        $newsClass = new NewsController;
        $news = $newsClass->getNewsByCatId(1);
        $domain = $_SERVER['SERVER_NAME'];
        $desc = ' - сайт агрегатор каких-то данных. Приветсвуем вас!';

        $data = [
            'domain' => $domain,
            'view' => 'main',
            'desc' => $desc,
            'news' => $news,
            'metaTitle' => 'Главная'
        ];

        return view('base', $data);
    }
}
