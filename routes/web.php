<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main', ['name' => 'Stanislav']);
});
Route::get('/about', function () {
    return view('about');
});

Route::get('/news', function () {
    $data = [
        'goods' => [
            [
                'h2' => 'Срок обвала курса доллара и последствия для мира',
                'desc' => 'Нефть в минусе? Минус? Какое странное слово? Мы о музыке?',
                'img' => 'https://api.rnet.plus/Service/TeaserImage?block_id=337&user_id=000022d4-5e44-0e42-b784-0d930c56692b&teaser_id=1313079&flight_id=2751&u=True&orig_url=https%3a%2f%2fstatic.rnet.plus%2f81%2fC7%2fB9%2f300x195_112_1313079.jpeg'
            ],
            [
                'h2' => 'Срок обвала курса доллара и последствия для мира',
                'desc' => 'Нефть в минусе? Минус? Какое странное слово? Мы о музыке?',
                'img' => 'https://api.rnet.plus/Service/TeaserImage?block_id=337&user_id=000022d4-5e44-0e42-b784-0d930c56692b&teaser_id=1313079&flight_id=2751&u=True&orig_url=https%3a%2f%2fstatic.rnet.plus%2f81%2fC7%2fB9%2f300x195_112_1313079.jpeg'
            ]
        ]
    ];

    return view('news', $data);
});

Route::get('/phpinfo', function () {
    phpinfo();
});
