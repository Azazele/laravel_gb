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
    'uses' => 'HomeMainController@index',
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
        'as' => 'admin.',
        'middleware' => ['auth', 'admin']

    ],
    function () {
        Route::resource('news', 'NewsController');
        Route::resource('cats', 'CategoryController');
        Route::resource('profiles', 'ProfileController');
        Route::resource('newsSources', 'NewsSourceController');
        Route::get('/newsSources/rssUpdate/{id}',[
            'uses' => 'NewsSourceController@rssUpdate',
            'as' => 'newsSources.rssUpdate'
        ]);
    }
);

Auth::routes();

Route::get('/logout', function (){
    Auth::logout();
    return redirect('/');
});

Route::get('/profile', [
    'uses' => 'ProfileController@index',
    'as' => 'profile',
    'middleware' => 'auth'
]);

Route::get('/auth/vkRedirect', [
    'uses' => 'Auth\VkAuthController@vkRedirect',
    'as' => 'vkRedirect'
]);
Route::get('/auth/vkAuth', [
    'uses' => 'Auth\VkAuthController@vkAuth',
    'as' => 'vkAuth'
]);
Route::get('/auth/fbRedirect', [
    'uses' => 'Auth\FbAuthController@vkRedirect',
    'as' => 'fbRedirect'
]);
Route::get('/auth/fbAuth', [
    'uses' => 'Auth\FbAuthController@vkAuth',
    'as' => 'fbAuth'
]);
