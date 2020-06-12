@extends('base')

@section('title', $metaTitle)

@section('content')
<div class="container cont">
    <div class="single">
        <img src="{{ $news->img }}" alt="{{ $news->title }}">
        <div class="single-content">
            <h1>{{ $news->title }}</h1>
            <p>{!! $news->content !!}</p>
            <p><span>Дата публикации: </span>{{ $news->created_at }}</p>
            <p><span>Категории: </span>
            @foreach ($cats as $cat)
                <a href="{{ route( 'news.cat', $cat->id ) }}">{{ $cat->title }}</a> |
            @endforeach
            </p>
        </div>
    </div>
</div>
@endsection
