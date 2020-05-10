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
            @foreach( $news as $elem)
            <div class="item news-elem">
                <a href="{{ route('news.all') . '/' . $elem['id'] }}">
                    <img src="{{ $elem['img'] }}" alt="{{ $elem['title'] }}">
                </a>
                <div class="news-elem-content">
                    <a href="{{ route('news.all') . '/' . $elem['id'] }}">
                        <h2>{{ $elem['title'] }}</h2>
                    </a>
                    <p><span>Дата публикации: </span>{{ $elem['date_published'] }}</p>
                    <a href="{{ route('news.all') . '/' . $elem['id'] }}">Узреть истину</a>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>
