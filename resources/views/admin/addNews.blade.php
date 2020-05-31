@extends('base')

@section('title', $metaTitle)

@section('content')
<div class="container cont">
    <form action="{{ route('admin.news.store') }}" method="post">
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
        <div class="form-group">
            <label for="formGroupExampleInput">Заголовок</label>
            <input name="title" type="text" class="form-control" id="formGroupExampleInput" value="{{ Request::old('title') }}" placeholder="Название статьи">
        </div>
        <div class="form-group">
            <p>Категории</p>
            @foreach($cats as $cat)
            <div class="form-check">
                <input name="cats[]" class="form-check-input" type="checkbox" value="{{ $cat->id }}">
                <label class="form-check-label" for="defaultCheck1">
                    {{ $cat->title }}
                </label>
            </div>
            @endforeach
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Описание</label>
            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ Request::old('content') }}</textarea>
        </div>
        <div class="form-group">
            <p>Новость приватная?</p>
            <div class="form-check">
                <input name="is_private" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="1" checked>
                <label class="form-check-label" for="exampleRadios1">
                    Да
                </label>
            </div>
            <div class="form-check">
                <input name="is_private" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="0">
                <label class="form-check-label" for="exampleRadios2">
                    Нет
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Добавить новую статью</button>
    </form>
</div>
@endsection
