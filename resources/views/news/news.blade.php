@extends('base')

@section('title', $metaTitle)

@section('content')
<div class="container cont">
    <h1>
        @if(isset($h))
            {{ $h }}
        @else
            Все новости
        @endif
    </h1>
    <div class="items">
        @if($news)
            @forelse($news as $elem)
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
            @empty
                <h2>К сожалению, новостей нет</h2>
            @endforelse
        @endif
    </div>
    {{ $news->links() }}
</div>
@endsection
