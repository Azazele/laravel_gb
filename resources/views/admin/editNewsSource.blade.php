@extends('base')

@section('title', $metaTitle)

@section('content')
<div class="container cont">
    <form action="{{ route('admin.newsSources.update', $resource) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="formGroupExampleInput">Заголовок</label>
            <input value="{{ $resource->title }}" name="title" type="text" class="form-control" id="formGroupExampleInput" placeholder="Название категории">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Ссылка на ресурс</label>
            <textarea name="link" class="form-control" id="exampleFormControlTextarea1" rows="3">
                {{ $resource->link }}
            </textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Ссылка на RSS</label>
            <textarea name="data_link" class="form-control" id="exampleFormControlTextarea1" rows="3">
                {{ $resource->data_link }}
            </textarea>
        </div>
        <button type="submit" class="btn btn-primary">Обновить ресурс</button>
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
