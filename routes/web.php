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

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'main'
]);

Route::match(['post', 'get'], '/feedback', [
    'uses' => 'FeedbackController@index',
    'as' => 'feedback'
]);

Route::match(['post', 'get'], '/order', [
    'uses' => 'OrderController@index',
    'as' => 'order'
]);

Route::group(
    [
        'prefix' => 'news',
        'namespace' => 'News',
        'as' => 'news.'

    ],
    function () {
        Route::get('/', [
            'uses' => 'NewsController@allNews',
            'as' => 'all'
        ]);
        Route::get('/cats', [
            'uses' => 'NewsController@allCats',
            'as' => 'allCats'
        ]);
        Route::get('/cats/{id}', [
            'uses' => 'NewsController@cat',
            'as' => 'cat'
        ]);
        Route::get('/{id}', [
            'uses' => 'NewsController@newsSingle',
            'as' => 'single'
        ]);
    }
);

Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'Admin',
        'as' => 'admin.'

    ],
    function () {
        Route::resource('news', 'NewsController');
        Route::resource('cats', 'CategoryController');
        Route::get('/login', [
            'uses' => 'LoginController@index',
            'as' => 'login'
        ]);
    }
);
