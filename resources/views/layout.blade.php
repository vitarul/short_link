<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Короткие ссылки</title>

    <!-- Main styles for this application-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
</head>
<body>
<div id="app" class="container">
    @yield('content')
</div>

<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
