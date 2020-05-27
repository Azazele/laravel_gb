@extends('base')

@section('title', $metaTitle)

@section('content')
<div class="container cont">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Название</th>
            <th scope="col">Дата публикации</th>
            <th scope="col">Дата обновления</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        @forelse($cats as $elem)
        <tr>
            <th scope="row">{{ $elem->id }}</th>
            <td>{{ $elem->title }}</td>
            <td>{{ $elem->created_at }}</td>
            <td>
                @if($elem->updated_at)
                    {{ $elem->updated_at }}
                @else
                    Не указано
                @endif
            </td>
            <td><a href="{{ route('admin.cats.edit', $elem) }}">Редактировать</a>
                <form action="{{ route('admin.cats.destroy', $elem) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary">Удалить</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <th scope="row">Пусто</th>
            <td>Пусто</td>
            <td>Пусто</td>
            <td>@Пусто</td>
        </tr>
        @endforelse

        </tbody>
    </table>
    {{ $cats->links() }}
</div>
@endsection
