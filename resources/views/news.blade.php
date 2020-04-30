<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hello world</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .container {
                margin: 0  auto;
                width: 1200px;
            }
            .news{
                display: flex;
                justify-content:space-between;
                flex-wrap: wrap;
                margin-top: 40px;
            }
            .newsElem{
                width: 500px;
                border: 3px #eeeeee solid;
                padding: 20px;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Новости
                </div>

                <div class="links">
                    <a href="/">Главная</a>
                    <a href="/about">О нас</a>
                </div>
                <div class="container news"><p></p>
                    @foreach ($goods as $good)
                        <div class="newsElem">
                            <img src="{{ $good['img'] }}" alt="">
                            <h2>{{ $good['h2'] }}</h2>
                            <p class="desc">{{ $good['desc'] }}</p>
                            <a href="" class="more">Читать...</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
