@extends('layout')

@section('content')
    @include('_errors')

    @if ($link)
        <div class="alert alert-info">
            Ваша короткая ссылка создана: <a href="{{ url($link->code) }}">{{ url($link->code) }}</a><br>
            Статистика переходов: <a href="{{ route('link.stats', $link) }}">{{ route('link.stats', $link) }}</a>
        </div>
    @endif

    <div class="card">
        <div class="card-header">Создать короткую ссылку</div>
        <div class="card-body">
            <form method="post" action="{{ route('link.store') }}">
                {{ csrf_field() }}
                <div class="form-row align-items-center">
                    <div class="col-8">
                        <label class="sr-only" for="longLink">Длинная ссылка</label>
                        <input type="text" class="form-control mb-2" id="longLink" placeholder="Введите вашу ссылку" name="link">
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary mb-2">Создать</button>
                    </div>
                </div>
                <hr>
                <h3>Дополнительные опции</h3>
                <div class="form-row align-items-center">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="userText">Текст для ссылки</label>
                            <input type="text" class="form-control" id="userText" name="code">
                            <small id="userText" class="form-text text-muted">Введите текст, который будет у ссылки после домена</small>
                        </div>
                        <div class="form-group">
                            <label for="expiredAt">Время жизни, дней</label>
                            <input type="number" class="form-control" id="expiredAt" name="expired_at" value="1">
                            <small id="expiredAt" class="form-text text-muted">Укажите количество дней, в течение которых короткая ссылка будет работать</small>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="isCommercial" name="is_commercial">
                            <label class="form-check-label" for="isCommercial">Коммерческая ссылка</label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
