<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
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
                    <!--li><a href="{{ route('feedback') }}">Отзывы</a></li>
                    <li><a href="{{ route('order') }}">Заказ выгрузки</a></li-->
                </ul>
                @if(Auth::check() && (bool)Auth::user()->is_admin === true)
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Панель администратора
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('admin.news.create')}}">Добавить новость</a>
                        <a class="dropdown-item" href="{{ route('admin.news.index')}}">Все новости</a>
                        <a class="dropdown-item" href="{{ route('admin.cats.create')}}">Добавить категорию</a>
                        <a class="dropdown-item" href="{{ route('admin.cats.index')}}">Все категории</a>
                        <a class="dropdown-item" href="{{ route('admin.profiles.index')}}">Редактирование пользователей</a>
                        <a class="dropdown-item" href="{{ route('logout')}}">Выход</a>
                    </div>
                </div>
                @elseif(Auth::check() && (bool)Auth::user()->is_admin === false)
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Параметры профиля
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('profile')}}">Редактирование профиля</a>
                        <a class="dropdown-item" href="{{ route('logout')}}">Выход</a>
                    </div>
                @else
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Учётная запись
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('login') }}">Войти</a>
                            <a class="dropdown-item" href="{{ route('register')}}">Регистрация</a>
                        </div>
                    </div>
                @endif
            </div>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer></footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</div>
</body>
</html>
