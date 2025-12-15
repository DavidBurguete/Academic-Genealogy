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
    <a href="/en/about-directors">About the directors</a>
    <hr class="separator">
    <a href="/en/methodology">Methodology</a>
    <hr class="separator">
    <a href="/en/history">A bit of history</a>
    <hr class="separator">
    <a href="/en/list?page=1">List of doctors</a>
@endsection

@section('content')
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
    <img src="{{ isset($doctor['photo']) ? asset('portrait/' . $doctor['photo']) : asset('portrait/NoPhoto.jpg') }}" alt="Portrait of doctor {{ $doctor['name'] }} {{ $doctor['surname1'] }} {{ isset($doctor['surname2']) ? $doctor['surname2'] : '' }}">
    <h3>{{ $doctor['thesistitle'] }}</h3>
    <p id="unknownexactdate" style="display: none;">{{ $doctor['unknownexactdate'] }}</p>
    <i>Defended at {{ $doctor['university']?:'an unkown university' }}, {{ $doctor['city']?: 'unkown city' }}, <span class="life-date">{{ $doctor['defensedate']?: 'unkown date' }}</span></i>
    <p class="faculty">
        Faculty of 
        @switch($doctor['faculty'])
            @case('sciences')
                Sciences
                @break
            @case('engineering-and-arquitecture')
                Engineering and Arquitecture
                @break
            @case('law')
                Law
                @break
            @case('communication')
                Communication
                @break
            @case('canon')
                Canon Law
                @break
            @case('philosophy-literature-education')
                Philosophy, Literature and Education
                @break
            @case('economy')
                Economy
                @break
            @case('nursing')
                Nursing
                @break
            @case('pharmacy-nutrition')
                Pharmacy and Nutrition
                @break
            @case('medicine')
                Medicine
                @break
            @case('theology')
                Theology
                @break
            @default
                (Unknown faculty)
        @endswitch
        {!! isset($doctor['teseoid']) ? '&nbsp;—&nbsp;TESEO: <a class="' . $doctor['faculty'] . '-underline" href="https://aplicaciones.ciencia.gob.es/teseo/#/tesis/O' . $doctor["teseoid"] . '/detalle">' . $doctor["teseoid"] . '</a>' : '' !!}
    </p>
    <hr>
    <h3 class="uppercase">Directors:</h3>
    @if(sizeof($directors) === 0)
        <i>No known director/s</i>
    @else
        <ol>
            @foreach($directors as $director)
                <li><a class="{{ $director['faculty'] }}-underline" href="?id={{ $director['id'] }}">{{ $director['name'] }} {{ $director['surname1'] }} {{ isset($director['surname2']) ? $director['surname2'] : '' }} [ {!! $director['relationtype'] === 'D' ? '&Dscr;' : '&Mscr;' !!} ]</a></li>
            @endforeach
        </ol>
    @endif
    <h3 class="uppercase">Students:</h3>
    @if(sizeof($students) === 0)
        <i>No known student/s</i>
    @else
        <ol id="students">
            @foreach($students as $student)
                <li><a class="{{ $student['faculty'] }}-underline" href="?id={{ $student['id'] }}">{{ $student['name'] }} {{ $student['surname1'] }} {{ isset($student['surname2']) ? $student['surname2'] : '' }}--{{ $student['defensedate'] }}</a></li>
            @endforeach
        </ol>
    @endif
    <h3 class="uppercase">Biography:</h3>
    <div class="biography">
        @if(isset($doctor['biography']))
            @if(file_exists('biography/en/' . $doctor['biography']))
                {{ $doctor['biography'] }}
            @elseif(file_exists('biography/es/' . $doctor['biography']) || file_exists('biography/fr/' . $doctor['biography']))
                <i>Biography not available in english, but in other languages (spanish or french)</i>
            @endif
        @else
            <i>No available biography</i>
        @endif
    </div>
@endsection
@include('layouts.common-en')