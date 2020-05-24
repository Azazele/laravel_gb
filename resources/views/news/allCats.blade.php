@extends('base')

@section('title', $metaTitle)

@section('content')
<div class="container cont">
    <h1>Категории</h1>
    @if($cats)
        <ul class="cats">
        @foreach( $cats as $cat)
            <li><a href="{{ route('news.cat', $cat->id)}}">{{ $cat->title }}</a></li>
        @endforeach
        </ul>
    @endif
</div>
@endsection
