@extends('base')

@section('title', $metaTitle)

@section('content')
<div class="container cont">
    <div class="single">
        <img src="{{ $news['img'] }}" alt="{{ $news['title'] }}">
        <div class="single-content">
            <h1>{{ $news['title'] }}</h1>
            <p>{{ $news['content'] }}</p>
            <p><span>Дата публикации: </span>{{ $news['date_published'] }}</p>
            <p>
                <span>Категория: </span>
                <a href="{{ route('news.allCats') . '/' . $cat['id'] }}">{{ $cat['name'] }}</a>
            </p>
        </div>
    </div>
</div>
@endsection
