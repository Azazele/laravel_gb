<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index () {
        $data = [
            'metaTitle' => 'Оставить отзыв'
        ];
        return view('feedback', $data);
    }
}
