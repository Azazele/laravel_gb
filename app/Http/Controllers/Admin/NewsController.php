<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\News\NewsController as MainNewsController;
use Illuminate\Http\Request;

class NewsController extends MainNewsController
{

    public function addNews ( Request $request) {
        $data = [
            'metaTitle' => 'Добавить новость',
            'cats' => $this->getCats()
        ];
        return view ('admin.addNews', $data);
    }
}
