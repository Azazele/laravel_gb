<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\News\NewsController;


class HomeMainController extends Controller
{

    public function index()
    {
        $news = News::query()->where('is_private', 1)->paginate(6);

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
