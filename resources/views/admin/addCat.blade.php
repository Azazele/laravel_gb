@extends('base')

@section('title', $metaTitle)

@section('content')
<div class="container cont">
    <form action="{{ route('admin.cats.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Заголовок</label>
            <input name="title" type="text" class="form-control" id="formGroupExampleInput" placeholder="Название категории">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Описание</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Добавить новую категорию</button>
    </form>
</div>
@endsection
