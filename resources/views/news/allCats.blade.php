@extends('base')

@section('title', $metaTitle)

@section('content')
<div class="container cont">
    <h1>Категории</h1>
    <div class="items">
        @if($cats)
            <ul class="cats">
            @foreach( $cats as $key => $elem)
                <li><a href="{{ route('news.allCats') . '/' . $key }}">{{ $elem }}</a></li>
            @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection
