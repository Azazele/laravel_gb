@extends('base')

@section('title', $metaTitle)

@section('content')
<div class="container cont">
    <form action="{{ route('admin.newsSources.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Заголовок</label>
            <input name="title" type="text" class="form-control" id="formGroupExampleInput" value="{{ Request::old('title') }}" placeholder="Название ресурса">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Ссылка на ресурс</label>
            <textarea name="link" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ Request::old('link') }}</textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Ссылка на RSS</label>
            <textarea name="data_link" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ Request::old('data_link') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Добавить новый источник</button>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection
