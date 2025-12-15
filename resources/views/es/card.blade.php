@extends('layouts.app')

@section('css-js')
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">
    <script src="{{ asset('js/date_formatter_cards_students.js') }}"></script>
    <script src="{{ asset('js/date_formatter_cards_lifedates.js') }}"></script>
@endsection

@section('faculty-color')
{{ $doctor['faculty'] }}
@endsection

@section('nav')
    <a href="/es/about-directors">Sobre los directores</a>
    <hr class="separator">
    <a href="/es/methodology">Metodología</a>
    <hr class="separator">
    <a href="/es/history">Algo de historia</a>
    <hr class="separator">
    <a href="/es/list?page=1">Listado</a>
@endsection

@section('content')
    <div class="personal-info">
        <h2>{{ $doctor['name'] }} {{ $doctor['surname1'] }} {{ isset($doctor['surname2']) ? $doctor['surname2'] : '' }}</h2>
        @if(isset($doctor['birthdate']))
            <p class="life-date">{{ $doctor['birthdate'] }}</p>
        @else
        <p class="life-date"><span style="height: 1rem;"></span></p>
        @endif
        <hr class="date-separator">
        @if(isset($doctor['deathdate']))
            <p class="life-date">{{ $doctor['deathdate'] }}</p>
        @else
            <p class="life-date"><span style="height: 1rem;"></span></p>
        @endif
    </div>
    <div class="thesis">
        <img src="{{ isset($doctor['photo']) ? asset('portrait/' . $doctor['photo']) : asset('portrait/NoPhoto.jpg') }}" alt="Retrato del doctor {{ $doctor['name'] }} {{ $doctor['surname1'] }} {{ isset($doctor['surname2']) ? $doctor['surname2'] : '' }}">
        <div class="thesis__text">
            <h3>{{ $doctor['thesistitle'] }}</h3>
            <p id="unknownexactdate" style="display: none;">{{ $doctor['unknownexactdate'] }}</p>
            <i>Defendida en {{ $doctor['university']?:'universidad desconocida' }}, {{ $doctor['city']?: 'ciudad desconocida' }}, <span class="life-date">{{ $doctor['defensedate']?: 'día desconocido' }}</span></i>
            <p class="faculty">
                Facultad de 
                @switch($doctor['faculty'])
                    @case('sciences')
                        Ciencias
                        @break
                    @case('engineering-and-arquitecture')
                        Ingeniería y Arquitectura
                        @break
                    @case('law')
                        Derecho
                        @break
                    @case('communication')
                        Comunicaciones
                        @break
                    @case('canon')
                        Derecho canónico
                        @break
                    @case('philosophy-literature-education')
                        Filosofía, Literatura y Educación
                        @break
                    @case('economy')
                        Economía
                        @break
                    @case('nursing')
                        Enfermería
                        @break
                    @case('pharmacy-nutrition')
                        Farmacia y Nutrición
                        @break
                    @case('medicine')
                        Medicina
                        @break
                    @case('theology')
                        Teología
                        @break
                    @default
                        (facultad desconocida)
                @endswitch
                {!! isset($doctor['teseoid']) ? '&nbsp;—&nbsp;TESEO: <a class="' . $doctor['faculty'] . '-underline" href="https://aplicaciones.ciencia.gob.es/teseo/#/tesis/O' . $doctor["teseoid"] . '/detalle">' . $doctor["teseoid"] . '</a>' : '' !!}
            </p>
            <hr>
            <h3 class="uppercase thesis__text__directors">Directores:</h3>
            @if(sizeof($directors) === 0)
                <i>Director/es desconocido/s</i>
            @else
                <ol>
                    @foreach($directors as $director)
                        <li><a class="{{ $director['faculty'] }}-underline" href="?id={{ $director['id'] }}">{{ $director['name'] }} {{ $director['surname1'] }} {{ isset($director['surname2']) ? $director['surname2'] : '' }} [ {!! $director['relationtype'] === 'D' ? '&Dscr;' : '&Mscr;' !!} ]</a></li>
                    @endforeach
                </ol>
            @endif
        </div>
    </div>
    <br>
    <br>
    <h3 class="uppercase">Estudiantes:</h3>
    @if(sizeof($students) === 0)
        <i>Estudiante/s desconocido/s</i>
    @else
        <ol id="students">
            @foreach($students as $student)
                <li><a class="{{ $student['faculty'] }}-underline" href="?id={{ $student['id'] }}">{{ $student['name'] }} {{ $student['surname1'] }} {{ isset($student['surname2']) ? $student['surname2'] : '' }}--{{ $student['defensedate'] }}</a></li>
            @endforeach
        </ol>
    @endif
    <br>
    <h3 class="uppercase">Biografía:</h3>
    <div class="biography">
        @if(isset($doctor['biography']))
            @if(file_exists('biography/es/' . $doctor['biography']))
                {!! file_get_contents('biography/es/' . $doctor['biography']) !!}
            @elseif(file_exists('biography/en/' . $doctor['biography']) || file_exists('biography/fr/' . $doctor['biography']))
                <i>Biografía no disponible en español, pero sí en otros idiomas (inglés o francés)</i>
            @endif
        @else
            <i>Biografía no disponible</i>
        @endif
    </div>
@endsection
@include('layouts.common-es')