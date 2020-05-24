@extends('base')

@section('title', $metaTitle)

@section('content')
<div class="content">
    <div class="title m-b-md">
        {{ $domain }} {{ $desc }}
    </div>
</div>
<div class="container">
    <h1>Виджет вывода категории</h1>
    <div class="items">
        @if($news)
            @foreach( $news as $elem)
                <div class="item news-elem">
                    <a href="{{ route('news.single', $elem->id) }}">
                        <img src="{{ $elem->img }}" alt="{{ $elem->title }}">
                    </a>
                    <div class="news-elem-content">
                        <a href="{{ route('news.single', $elem->id) }}">
                            <h2>{{ $elem->title }}</h2>
                        </a>
                        <p><span>Дата публикации: </span>{{ $elem->created_at }}</p>
                        <a href="{{ route('news.single', $elem->id) }}">Узреть истину</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
