@extends('base')

@section('title', $metaTitle)

@section('content')
    <div class="container cont">
        <form action="{{ route('order') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="formGroupExampleInput">Ваше имя</label>
                <input name="name" type="text" class="form-control" id="formGroupExampleInput" placeholder="Иван Иванов">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Номер телефона</label>
                <input name="phone" type="phone" class="form-control" id="formGroupExampleInput" placeholder="+7 (999)-999-99-99">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Электронная почта</label>
                <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Какие данные нужны</label>
                <textarea name="order" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Заказать данные</button>
        </form>
    </div>
@endsection
