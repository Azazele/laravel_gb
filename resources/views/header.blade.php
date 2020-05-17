<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $metaTitle }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <header>
        <nav>
            <div class="container">
                <div class="logo"><a href="/">laravel.local</a></div>
                <ul class="menu">
                    <li><a href="/">Главная</a></li>
                    <li><a href="{{ route('news.all') }}">Все новости</a></li>
                    <li><a href="{{ route('news.allCats') }}">Категории</a></li>
                    <li><a href="{{ route('login') }}">Авторизация</a></li>
                    <li><a href="{{ route('news.all') . '/add' }}">Добавить новость</a></li>
                </ul>
            </div>
        </nav>
    </header>
