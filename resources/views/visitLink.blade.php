@extends('layout')

@section('content')
    @include('_errors')

    <script>
        function redirect() {
            window.location.href = "{{ $linkVisit->link->link }}";
        }
    </script>

    @if ($linkVisit->showed_picture)
        <div class="card">
            <div class="card-header">На правах рекламы</div>
            <div class="card-body">
                <img src="{{ asset('pictures/'.$linkVisit->showed_picture) }}">
            </div>
        </div>

        <script>
            setTimeout(redirect, 5000)
        </script>
    @else
        <script>
            redirect()
        </script>
    @endif
@stop
