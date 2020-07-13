@extends('layout')

@section('content')
    <div class="card">
        <div class="card-header">Статистика переходов по всем ссылкам</div>
        <div class="card-body">
            <table class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">Количество</th>
                    <th scope="col">Код ссылки</th>
                    <th scope="col">Ссылка</th>
                </tr>
                </thead>
                <tbody>
                @foreach($linkStats as $linkStat)
                    <tr>
                        <th>{{ $linkStat->visits }}</th>
                        <td>{{ $linkStat->code }}</td>
                        <td>{{ $linkStat->link }}</td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
            {{ $linkStats->links() }}
        </div>
    </div>
@stop
