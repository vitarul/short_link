@if($errors->any())
    <div class="alert alert-danger">
        <p><strong>Ошибка в заполнении данных</strong></p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

