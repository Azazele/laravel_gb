@extends('base')

@section('title', $metaTitle)

@section('content')
<div class="container cont">
    <form action="{{ route('admin.profiles.update', $profile) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="formGroupExampleInput">Имя</label>
            <input value="{{ $profile->name }}" name="name" type="text" class="form-control" id="formGroupExampleInput" placeholder="Название категории">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Email</label>
            <input value="{{ $profile->email }}" name="email" type="email" class="form-control" id="formGroupExampleInput" placeholder="Название категории">
        </div>
        <div class="form-group">
            <p>Это админ?</p>
            <div class="form-check">
                <input name="is_admin" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="1" @if($profile->is_admin === 1)checked @endif>
                <label class="form-check-label" for="exampleRadios1">
                    Да
                </label>
            </div>
            <div class="form-check">
                <input name="is_admin" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="0"@if($profile->is_admin === 0)checked @endif>
                <label class="form-check-label" for="exampleRadios2">
                    Нет
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Обновить профиль</button>
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
