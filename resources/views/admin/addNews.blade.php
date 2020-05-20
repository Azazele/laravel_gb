@extends('base')

@section('title', $metaTitle)

@section('content')
<div class="container cont">
    <form action="{{ route('admin.addNews') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Заголовок</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Название статьи">
        </div>
        <div class="form-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile" data-browse="загрузка">Загрузка изображения</label>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Выбор категории</label>
            <select class="form-control" id="exampleFormControlSelect1">
                @foreach($cats as $cat)
                    <option>{{ $cat }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Описание</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Добавить новую статью</button>
    </form>
</div>
@endsection
