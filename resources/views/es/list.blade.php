@extends('layouts.app')

@section('css-js')
    <link rel="stylesheet" href="{{ asset('css/list.css') }}">
    <script src="{{ asset('js/date_formatter.js') }}"></script>
@endsection

@section('faculty-color')
sciences
@endsection

@section('nav')
    <a href="/es/about-directors">Sobre los directores</a>
    <hr class="separator">
    <a href="/es/methodology">Metodología</a>
    <hr class="separator">
    <a href="/es/history">Algo de historia</a>
    <hr class="separator">
    <a>Listado</a>
@endsection

@section('content')
    <h2>Listado</h2>
    <div class="main__sorting">
        <a href="?page={{ 
            request()->get('page') 
        }}{{ 
            request()->has('name') ? (request()->get('name') == 'ascendent' ? '&name=descendent' : '') : '&name=ascendent' 
        }}{{ 
            request()->has('search') ? '&search=' . request()->get('search') : '' 
        }}">
            Nombre
            {!! request()->has('name') && request()->get('name') == 'ascendent' ? '<img src="' . asset('img/dropdown.png') . '">' : '' !!}
            {!! request()->has('name') && request()->get('name') == 'descendent' ? '<img src="' . asset('img/dropdown.png') . '" style="transform: rotate(180deg);">' : '' !!}
        </a>
        <hr>
        <a href="?page={{ 
            request()->get('page') 
        }}{{ 
            request()->has('thesis') ? (request()->get('thesis') == 'ascendent' ? '&thesis=descendent' : '') : '&thesis=ascendent' 
        }}{{ 
            request()->has('search') ? '&search=' . request()->get('search') : '' 
        }}">
            Tesis
            {!! request()->has('thesis') && request()->get('thesis') == 'ascendent' ? '<img src="' . asset('img/dropdown.png') . '">' : '' !!}
            {!! request()->has('thesis') && request()->get('thesis') == 'descendent' ? '<img src="' . asset('img/dropdown.png') . '" style="transform: rotate(180deg);">' : '' !!}
        </a>
        <hr>
        <a href="?page={{ 
            request()->get('page') 
        }}{{
            request()->has('date') ? (request()->get('date') == 'ascendent' ? '&date=descendent' : '') : '&date=ascendent' 
        }}{{ 
            request()->has('search') ? '&search=' . request()->get('search') : '' 
        }}">
            Fecha
            {!! request()->has('date') && request()->get('date') == 'ascendent' ? '<img src="' . asset('img/dropdown.png') . '">' : '' !!}
            {!! request()->has('date') && request()->get('date') == 'descendent' ? '<img src="' . asset('img/dropdown.png') . '" style="transform: rotate(180deg);">' : '' !!}
        </a>
    </div>
    <div class="main__container">
        @foreach($doctors as $doctor)
            <a href="/es/card?id={{ $doctor['id'] }}" class="main__container__card">
                @if(!$doctor['photo'])
                    <img src="{{ asset('portrait/NoPhoto.jpg') }}" alt="Retraro ausente del doctor {{ $doctor['name'] }} {{ $doctor['surname1'] }}">
                @else
                    <img src="{{ asset('portrait/' . $doctor['photo']) }}" alt="Retrato del doctor {{ $doctor['name'] }} {{ $doctor['surname1'] }}">
                @endif
                <div class="main__container__card__text">
                    <p><b>{{ $doctor['name'] }} {{ $doctor['surname1'] }} {{ isset($doctor['surname2']) ? $doctor['surname2'] : '' }}</b></p>
                    <i>{{ $doctor['defensedate']?:'Fecha desconocida' }}</i>
                    <p data-type="unknownexactdate" style="display: none;">{{ $doctor['unknownexactdate'] }}</p>
                    <p>TESIS: {{ $doctor['thesistitle'] ?: 'Desconocida' }}</p>
                </div>
            </a>
        @endforeach
    </div>
    <div class="main__pagination">
        @if(count($doctors) <= 0)
            <p>No hay ninguna coincidencia</p>
        @else
            @if($page - 1 >= 1)
                <a href="?page={{ $page - 1 }}{{ 
                    request()->has('name') ? '&name=' . request()->get('name') : '' 
                }}{{ 
                    request()->has('thesis') ? '&thesis=' . request()->get('thesis') : '' 
                }}{{ 
                    request()->has('date') ? '&date=' . request()->get('date') : '' 
                }}{{ 
                    request()->has('search') ? '&search=' . request()->get('search') : '' 
                }}">
                    <img src="{{ asset('img/arrow.svg') }}" alt="previous page">
                </a>
            @else
                <a class="disabled">
                    <img src="{{ asset('img/arrow.svg') }}" alt="next page">
                </a>
            @endif

            @if($page != 1)
                <a href="?page=1{{ 
                    request()->has('name') ? '&name=' . request()->get('name') : '' 
                }}{{ 
                    request()->has('thesis') ? '&thesis=' . request()->get('thesis') : '' 
                }}{{ 
                    request()->has('date') ? '&date=' . request()->get('date') : '' 
                }}{{ 
                    request()->has('search') ? '&search=' . request()->get('search') : '' 
                }}">
                    1
                </a>
            @endif

            @if($page - 3 > 1)
                <a>...</a>
            @endif

            @if($page - 2 > 1)
                <a href="?page={{ $page - 2 }}{{ 
                    request()->has('name') ? '&name=' . request()->get('name') : '' 
                }}{{ 
                    request()->has('thesis') ? '&thesis=' . request()->get('thesis') : '' 
                }}{{ 
                    request()->has('date') ? '&date=' . request()->get('date') : '' 
                }}{{ 
                    request()->has('search') ? '&search=' . request()->get('search') : '' 
                }}">
                    {{ $page - 2 }}
                </a>
            @endif

            @if($page - 1 > 1)
                <a href="?page={{ $page - 1 }}{{ 
                    request()->has('name') ? '&name=' . request()->get('name') : '' 
                }}{{ 
                    request()->has('thesis') ? '&thesis=' . request()->get('thesis') : '' 
                }}{{ 
                    request()->has('date') ? '&date=' . request()->get('date') : '' 
                }}{{ 
                    request()->has('search') ? '&search=' . request()->get('search') : '' 
                }}">
                    {{ $page - 1 }}
                </a>
            @endif

            <a><b>{{ $page }}</b></a>

            @if($page + 1 < $pages)
                <a href="?page={{ $page + 1 }}{{ 
                    request()->has('name') ? '&name=' . request()->get('name') : '' 
                }}{{ 
                    request()->has('thesis') ? '&thesis=' . request()->get('thesis') : '' 
                }}{{ 
                    request()->has('date') ? '&date=' . request()->get('date') : '' 
                }}{{ 
                    request()->has('search') ? '&search=' . request()->get('search') : '' 
                }}">
                    {{ $page + 1 }}
                </a>
            @endif

            @if($page + 2 < $pages)
                <a href="?page={{ $page + 2 }}{{ 
                    request()->has('name') ? '&name=' . request()->get('name') : '' 
                }}{{ 
                    request()->has('thesis') ? '&thesis=' . request()->get('thesis') : '' 
                }}{{ 
                    request()->has('date') ? '&date=' . request()->get('date') : '' 
                }}{{ 
                    request()->has('search') ? '&search=' . request()->get('search') : '' 
                }}">
                    {{ $page + 2 }}
                </a>
            @endif

            @if($page + 3 < $pages)
                <a>...</a>
            @endif

            @if($page != $pages)
                <a href="?page={{ $pages }}{{ 
                    request()->has('name') ? '&name=' . request()->get('name') : '' 
                }}{{ 
                    request()->has('thesis') ? '&thesis=' . request()->get('thesis') : '' 
                }}{{ 
                    request()->has('date') ? '&date=' . request()->get('date') : '' 
                }}{{ 
                    request()->has('search') ? '&search=' . request()->get('search') : '' 
                }}">
                    {{ $pages }}
                </a>
            @endif

            @if($page + 1 <= $pages)
                <a class="flip" href="?page={{ $page + 1 }}{{ 
                    request()->has('name') ? '&name=' . request()->get('name') : '' 
                }}{{ 
                    request()->has('thesis') ? '&thesis=' . request()->get('thesis') : '' 
                }}{{ 
                    request()->has('date') ? '&date=' . request()->get('date') : '' 
                }}{{ 
                    request()->has('search') ? '&search=' . request()->get('search') : '' 
                }}">
                    <img src="{{ asset('img/arrow.svg') }}" alt="previous page">
                </a>
            @else
                <a class="flip disabled">
                    <img src="{{ asset('img/arrow.svg') }}" alt="previous page">
                </a>
            @endif
        @endif
    </div>
@endsection
@include('layouts.common-es')