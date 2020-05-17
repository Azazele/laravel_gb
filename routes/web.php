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

Route::get('/login', [
    'uses' => 'LoginController@index',
    'as' => 'login'
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
        Route::get('/add', [
            'uses' => 'NewsController@addNewsRedir',
            'as' => 'addRedir'
        ]);
        Route::get('/add/{id}', [
            'uses' => 'NewsController@addNews',
            'as' => 'add'
        ]);
        Route::get('/{id}', [
            'uses' => 'NewsController@newsSingle',
            'as' => 'single'
        ]);
    }
);
