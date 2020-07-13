@extends('layout')

@section('content')
    <div class="card">
        <div class="card-header">Статистика переходов по ссылке {{ $link->code }}</div>
        <div class="card-body">
            <table class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Дата перехода</th>
                    @if ($link->is_commercial)<th scope="col">Картинка</th>@endif
                </tr>
                </thead>
                <tbody>
                @foreach($linkVisits as $visit)
                    <tr>
                        <th scope="row">{{ $visit->id }}</th>
                        <td>{{ $visit->created_at }}</td>
                        @if ($link->is_commercial)<td>{{ $visit->showed_picture }}</td>@endif
                    </tr>
                    </tbody>
                @endforeach
            </table>
            {{ $linkVisits->links() }}
        </div>
    </div>
@stop
