@extends('base')

@section('title', $metaTitle)

@section('content')
    <div class="container cont">
        <form action="{{ route('feedback') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Электронная почта</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Ваше имя</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Иван Иванов">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Отзыв</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Оставить отзыв</button>
        </form>
    </div>
@endsection
