<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\NewsModel;

class NewsController extends Controller
{
    public function addNews ( Request $request) {
        $newsModel = new NewsModel();
        $cats = $newsModel->getCats();

        $data = [
            'metaTitle' => 'Добавить новость',
            'cats' => $cats
        ];
        return view ('admin.addNews', $data);
    }
}
