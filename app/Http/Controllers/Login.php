<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Login extends Controller
{
    public function index() {
        $data = [
            'metaTitle' => 'Вход',
            'view' => 'login'
        ];
        return view('base', $data);
    }
}
