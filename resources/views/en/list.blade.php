@extends('layouts.app')

@section('css-js')
    <link rel="stylesheet" href="{{ asset('css/list.css') }}">
    <script src="{{ asset('js/date_formatter.js') }}"></script>
@endsection

@section('faculty-color')
sciences
@endsection

@section('nav')
    <a href="/en/about-directors">About the directors</a>
    <hr class="separator">
    <a href="/en/methodology">Methodology</a>
    <hr class="separator">
    <a href="/en/history">A bit of history</a>
    <hr class="separator">
    <a>List of doctors</a>
@endsection

@section('content')
    <h2>List of doctors</h2>
    <div class="main__container">
        @foreach($doctors as $doctor)
            <a href="/en/card?id={{ $doctor['id'] }}" class="main__container__card">
                @if(!$doctor['photo'])
                    <img src="{{ asset('portrait/NoPhoto.jpg') }}" alt="Missing portrait of doctor {{ $doctor['name'] }} {{ $doctor['surname1'] }}">
                @else
                    <img src="{{ asset('portrait/' . $doctor['photo']) }}" alt="Portrait of doctor {{ $doctor['name'] }} {{ $doctor['surname1'] }}">
                @endif
                <div class="main__container__card__text">
                    <p><b>{{ $doctor['name'] }} {{ $doctor['surname1'] }} {{ isset($doctor['surname2']) ? $doctor['surname2'] : '' }}</b></p>
                    <i>{{ $doctor['defensedate']?:'Fecha desconocida' }}</i>
                    <p>THESIS: {{ $doctor['thesistitle'] ?: 'Desconocida' }}</p>
                </div>
            </a>
        @endforeach
    </div>
    <div class="main__pagination">
        @if($page - 1 >= 1)
            <a href="?page={{ $page - 1 }}">
                <img src="{{ asset('img/arrow.svg') }}" alt="previous page">
            </a>
        @else
            <a class="disabled">
                <img src="{{ asset('img/arrow.svg') }}" alt="next page">
            </a>
        @endif

        @if($page != 1)
            <a href="?page=1">1</a>
        @endif

        @if($page - 3 > 1)
            <a>...</a>
        @endif

        @if($page - 2 > 1)
            <a href="?page={{ $page - 2 }}">{{ $page - 2 }}</a>
        @endif

        @if($page - 1 > 1)
            <a href="?page={{ $page - 1 }}">{{ $page - 1 }}</a>
        @endif

        <a><b>{{ $page }}</b></a>

        @if($page + 1 < $pages)
            <a href="?page={{ $page + 1 }}">{{ $page + 1 }}</a>
        @endif

        @if($page + 2 < $pages)
            <a href="?page={{ $page + 2 }}">{{ $page + 2 }}</a>
        @endif

        @if($page + 3 < $pages)
            <a>...</a>
        @endif

        @if($page != $pages)
            <a href="?page={{ $pages }}">{{ $pages }}</a>
        @endif

        @if($page + 1 <= $pages)
            <a class="flip" href="?page={{ $page + 1 }}">
                <img src="{{ asset('img/arrow.svg') }}" alt="previous page">
            </a>
        @else
            <a class="flip disabled">
                <img src="{{ asset('img/arrow.svg') }}" alt="previous page">
            </a>
        @endif
    </div>
@endsection
@include('layouts.common-en')