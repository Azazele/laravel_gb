@extends('base')

@section('title', $metaTitle)

@section('content')
<div class="container cont">
    <form action="{{ route('admin.news.update', $news) }}" method="post" enctype="multipart/form-data">
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
            <div class="custom-file">
                <label for="exampleFormControlFile1">Замена изображения</label>
                <input type="file" value="{{ $news->img }}" name="img" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <img src="{{ asset('uploads') . '/' . $news->img }}" width="200">
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
            <textarea id="add-news" name="content" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $news->content }}</textarea>
        </div>
        <div class="form-group">
            <p>Новость приватная?</p>
            <div class="form-check">
                <input name="is_private" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="1" @if($news->is_private === 1)checked @endif>
                <label class="form-check-label" for="exampleRadios1">
                    Да
                </label>
            </div>
            <div class="form-check">
                <input name="is_private" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="0"@if($news->is_private === 0)checked @endif>
                <label class="form-check-label" for="exampleRadios2">
                    Нет
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Обновить информацию</button>
    </form>
</div>
@endsection

@push('footer-scripts')
    <script type="text/javascript" src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        let options = {
            filebrowserImageBrowseUrl: '{{ asset('laravel-filemanager?type=Images') }}',
            filebrowserImageUploadUrl: '{{ asset('laravel-filemanager/upload?type=Images&_token=') }}',
            filebrowserBrowseUrl: '{{ asset('laravel-filemanager?type=Files') }}',
            filebrowserUploadUrl: '{{ asset('laravel-filemanager/upload?type=Files&_token=') }}'
        };
        CKEDITOR.replace('add-news', options);
    </script>
@endpush
