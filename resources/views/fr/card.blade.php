@extends('layouts.app')

@section('css-js')
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">
    <script type="module" src="{{ asset('js/date_formatter_cards_students.js') }}"></script>
    <script type="module" src="{{ asset('js/date_formatter_cards_lifedates.js') }}"></script>
    <script src="{{ asset('js/toggleModalDelete.js') }}"></script>
@endsection

@section('faculty-color')
{{ $doctor['faculty'] }}
@endsection

@section('nav')
    <a href="/fr/about-directors">À propos des directeurs</a>
    <hr class="separator">
    <a href="/fr/methodology">Méthodologie</a>
    <hr class="separator">
    <a href="/fr/history">Bref historique</a>
    <hr class="separator">
    <a href="/fr/list?page=1">Liste</a>
@endsection

@section('content')
    @if(session('isChanged'))
        <script>
            Toastify({
                text: "Modifications enregistrées",
                duration: 5000,
                newWindow: true,
                close: true,
                gravity: "top",
                position: "center", 
                stopOnFocus: true,
                style: {
                    padding: '1.2rem',
                    fontFamily: "Roboto",
                    fontWeight: 700,
                    fontSize: "1.2rem",
                    background: "#06EF38",
                }
            }).showToast();
        </script>
    @endif
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
        @if(Auth()->check())
            <div class="card-manipulation">
                <a href="/fr/card/edit?id={{ $doctor['id'] }}"><img src="{{ asset('img/pen.svg') }}" alt="Modifier la fiche"></a>
                @if(hasRoleAtLeast(Auth()->user()->role, "admin"))
                    <button class="main__content__info--delete" type="button" id="modalDeleteButton"><img src="{{ asset('img/trash.svg') }}" alt="Supprimer la fiche"></button>
                @endif
            </div>
        @endif
    </div>
    <div class="thesis">
        @if(!$doctor['photo'])
            <img src="{{ asset('portrait/NoPhoto.jpg') }}" alt="Portrait du Dr {{ $doctor['name'] }} {{ $doctor['surname1'] }} {{ isset($doctor['surname2']) ? $doctor['surname2'] : '' }} manquant">
        @else
            <img src="{{ asset('portrait/' . $doctor['photo']) }}" alt="Portrait du Dr {{ $doctor['name'] }} {{ $doctor['surname1'] }} {{ isset($doctor['surname2']) ? $doctor['surname2'] : '' }}">
        @endif
        <div class="thesis__text">
            <h3>{{ isset($doctor['thesistitle']) ? $doctor['thesistitle'] : 'Thèse inconnue' }}</h3>
            <p id="unknownexactdate" style="display: none;">{{ $doctor['unknownexactdate'] }}</p>
            <i>Soutenue à l'{{ $doctor['university']?:'université inconnue' }}, {{ $doctor['city']?: 'ville inconnue' }}, <span class="life-date">{{ $doctor['defensedate']?: 'date inconnue' }}</span></i>
            <p class="faculty-teseo">
                Faculté de 
                @switch($doctor['faculty'])
                    @case('sciences')
                        Sciences
                        @break
                    @case('engineering-and-arquitecture')
                        Ingénierie et Architecture
                        @break
                    @case('law')
                        Droit
                        @break
                    @case('communication')
                        Communications
                        @break
                    @case('canon')
                        Droit Canonique
                        @break
                    @case('philosophy-literature-education')
                        Philosophie, Littérature et Éducation
                        @break
                    @case('economy')
                        Économie
                        @break
                    @case('nursing')
                        Soins Infirmiers
                        @break
                    @case('pharmacy-nutrition')
                        Pharmacie et Nutrition
                        @break
                    @case('medicine')
                        Médecine
                        @break
                    @case('theology')
                        Théologie
                        @break
                    @default
                        (faculté inconnue)
                @endswitch
                {!! isset($doctor['teseoid']) ? '&nbsp;—&nbsp;TESEO: <a class="' . $doctor['faculty'] . '-underline" href="https://aplicaciones.ciencia.gob.es/teseo/#/tesis/O' . $doctor["teseoid"] . '/detalle">' . $doctor["teseoid"] . '</a>' : '' !!}
            </p>
            <hr>
            <h3 class="uppercase thesis__text__directors">Directeurs:</h3>
            @if(sizeof($directors) === 0)
                <i>Directeur(s) inconnu(s)</i>
            @else
                <ol>
                    @foreach($directors as $director)
                        <li><a class="{{ $director['faculty'] == '' ? 'unknown' : $director['faculty'] }}-underline" href="?id={{ $director['id'] }}">{{ $director['name'] }} {{ $director['surname1'] }} {{ isset($director['surname2']) ? $director['surname2'] : '' }} [ {!! $director['relationtype'] === 'D' ? '<span style="line-height: 1rem;">&Dscr;</span>' : '<span style="line-height: 1rem;">&Mscr;</span>' !!} ]</a></li>
                    @endforeach
                </ol>
            @endif
        </div>
    </div>
    <br>
    <br>
    <h3 class="uppercase">Étudiants:</h3>
    @if(sizeof($students) === 0)
        <i>Étudiants inconnus</i>
    @else
        <ol id="students">
            @foreach($students as $student)
                <li><a class="{{ $student['faculty'] }}-underline" href="?id={{ $student['id'] }}"><span style="display:none;">{{ $student['unknownexactdate'] }}</span>{{ $student['name'] }} {{ $student['surname1'] }} {{ isset($student['surname2']) ? $student['surname2'] : '' }}--{{ $student['defensedate'] }}</a></li>
            @endforeach
        </ol>
    @endif
    <br>
    <h3 class="uppercase">Biographie:</h3>
    <div class="biography">
        @if(isset($doctor['biography']))
            @if(file_exists('biography/fr/' . $doctor['biography']))
                {!! file_get_contents('biography/fr/' . $doctor['biography']) !!}
            @elseif(file_exists('biography/en/' . $doctor['biography']) || file_exists('biography/es/' . $doctor['biography']))
                <i>Biographie non disponible en français, mais disponible dans d'autres langues</i>
            @endif
        @else
            <i>Biographie non disponible</i>
        @endif
    </div>
    <div class="main__modal" id="modalDelete">
        <h2>Supprimer la fiche</h2>
        <hr>
        <p>
            Vous êtes sur le point de supprimer cette fiche. Êtes-vous sûr de votre décision?
            Cette action est irréversible et prendra effet immédiatement après validation
        </p>
        <form autocomplete="off" action="/fr/delete-card?id={{ $doctor['id'] }}" method="POST" class="main__modal__actions">
            <button type="button" id="closeModal">Non, conserver la fiche</button>
            @csrf
            <button type="submit">Oui, supprimer</button>
        </form>
    </div>
@endsection
@include('layouts.common-fr')