@extends('base')

@section('title', $metaTitle)

@section('content')
<div class="container cont">
    <form action="{{ route('admin.news.update', $news) }}" method="post">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        @method('put')
        <div class="form-group">
            <label for="formGroupExampleInput">Заголовок</label>
            <input name="title" type="text" class="form-control" id="formGroupExampleInput" value="{{ $news->title }}" placeholder="Название статьи">
        </div>
        <div class="form-group">
            <p>Категории</p>
            @foreach($cats as $cat)
            <div class="form-check">
                <input name="cats[]" class="form-check-input" type="checkbox" value="{{ $cat->id }}"
                @if ($cat::find($cat->id)->news()->where('id', $news->id)->get()->isNotEmpty()) checked @endif>
                <label class="form-check-label" for="defaultCheck1">
                    {{ $cat->title }}
                </label>
            </div>
            @endforeach
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Описание</label>
            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $news->content }}</textarea>
        </div>
        <div class="form-group">
            <p>Новость приватная?</p>
            <div class="form-check">
                <input name="is_private" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="{{ $news->is_private }}" @if($news->is_private === 1)checked @endif>
                <label class="form-check-label" for="exampleRadios1">
                    Да
                </label>
            </div>
            <div class="form-check">
                <input name="is_private" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="{{ $news->is_private }}"@if($news->is_private === 0)checked @endif>
                <label class="form-check-label" for="exampleRadios2">
                    Нет
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Обновить информацию</button>
    </form>
</div>
@endsection
