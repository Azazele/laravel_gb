@extends('base')

@section('title', $metaTitle)

@section('content')
<div class="container cont">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Название</th>
            <th scope="col">Ссылка на ресурс</th>
            <th scope="col">Ссылка на RSS</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        @forelse($sources as $elem)
        <tr>
            <th scope="row">{{ $elem->id }}</th>
            <td>{{ $elem->title }}</td>
            <td>{{ $elem->link }}</td>
            <td>
                @if($elem->data_link)
                    {{ $elem->data_link }}
                @else
                    Не указано
                @endif
            </td>
            <td><a href="{{ route('admin.newsSources.edit', $elem) }}">Редактировать</a> |
                <a href="{{ route('admin.newsSources.rssUpdate', $elem->id) }}">Обновить новости</a>
                <form action="{{ route('admin.newsSources.destroy', $elem->id) }}" method="post">
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
    {{ $sources->links() }}
</div>
@endsection
