@extends('layouts.app')

@section('css-js')
    <link rel="stylesheet" href="{{ asset('css/list.css') }}">
    <script type="module" src="{{ asset('js/date_formatter.js') }}"></script>
    <script src="{{ asset('js/redirect_faculty.js') }}"></script>
@endsection

@section('faculty-color')
{{ request()->has('faculty') ? request()->get('faculty') : 'sciences' }}
@endsection

@section('nav')
    <a href="/fr/about-directors">À propos des directeurs</a>
    <hr class="separator">
    <a href="/fr/methodology">Méthodologie</a>
    <hr class="separator">
    <a href="/fr/history">Bref historique</a>
    <hr class="separator">
    <a>Liste</a>
@endsection

@section('content')
    @if(request()->session()->exists("cardDeleted"))
        <script>
            Toastify({
                text: "La fiche a été effacé avec succèss",
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
    <div class="content-header">
        <h2>Liste</h2>
        @if(Auth()->check())
            <a href="/fr/create-card"><span>+</span> Créer une nouvelle fiche académique</a>
        @endif
    </div>
    <div class="main__sorting">
        <a href="?page={{ 
            request()->get('page') 
        }}{{ 
            request()->has('name') ? (request()->get('name') == 'ascendent' ? '&name=descendent' : '') : '&name=ascendent' 
        }}{{ 
            request()->has('search') ? '&search=' . request()->get('search') : '' 
        }}{{ 
            request()->has('faculty') ? '&faculty=' . request()->get('faculty') : '' 
        }}">
            Nom
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
        }}{{ 
            request()->has('faculty') ? '&faculty=' . request()->get('faculty') : '' 
        }}">
            Thèse
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
        }}{{ 
            request()->has('faculty') ? '&faculty=' . request()->get('faculty') : '' 
        }}">
            Date
            {!! request()->has('date') && request()->get('date') == 'ascendent' ? '<img src="' . asset('img/dropdown.png') . '">' : '' !!}
            {!! request()->has('date') && request()->get('date') == 'descendent' ? '<img src="' . asset('img/dropdown.png') . '" style="transform: rotate(180deg);">' : '' !!}
        </a>
        <hr class="filter-separator-desktop">
        <a>Filtre par faculté:</a><select name="faculty" id="faculty">
            <option value="">-- Sélectionner une option --</option>
            <option {{ request()->get('faculty') == 'engineering-and-arquitecture' ? 'selected' : '' }} value="engineering-and-arquitecture">Ingénierie et Architecture</option>
            <option {{ request()->get('faculty') == 'sciences' ? 'selected' : '' }} value="sciences">Sciences</option>
            <option {{ request()->get('faculty') == 'law' ? 'selected' : '' }} value="law">Droit</option>
            <option {{ request()->get('faculty') == 'communication' ? 'selected' : '' }} value="communication">Communication</option>
            <option {{ request()->get('faculty') == 'canon' ? 'selected' : '' }} value="canon">Droit Canonique</option>
            <option {{ request()->get('faculty') == 'philosophy-literature-education' ? 'selected' : '' }} value="philosophy-literature-education">Philosophie, Littérature et Éducation</option>
            <option {{ request()->get('faculty') == 'economy' ? 'selected' : '' }} value="economy">Économie</option>
            <option {{ request()->get('faculty') == 'nursing' ? 'selected' : '' }} value="nursing">Soins Infirmiers</option>
            <option {{ request()->get('faculty') == 'pharmacy-nutrition' ? 'selected' : '' }} value="pharmacy-nutrition">Pharmacie et Nutrition</option>
            <option {{ request()->get('faculty') == 'medicine' ? 'selected' : '' }} value="medicine">Médecine</option>
            <option {{ request()->get('faculty') == 'theology' ? 'selected' : '' }} value="theology">Théologie</option>
            <option {{ request()->get('faculty') == 'unknown' ? 'selected' : '' }} value="unknown">Inconnu</option>
        </select>
    </div>
    <div class="main__container">
        @foreach($doctors as $doctor)
            <a href="/fr/card?id={{ $doctor['id'] }}" class="main__container__card main__container__card--{{ $doctor['faculty'] == '' ? 'unknown' : $doctor['faculty'] }}">
                @if(!$doctor['photo'])
                    <img src="{{ asset('portrait/NoPhoto.jpg') }}" alt="Portrait du Dr {{ $doctor['name'] }} {{ $doctor['surname1'] }} {{ isset($doctor['surname2']) ? $doctor['surname2'] : '' }} manquant">
                @else
                    <img src="{{ asset('portrait/' . $doctor['photo']) }}" alt="Portrait du Dr {{ $doctor['name'] }} {{ $doctor['surname1'] }} {{ isset($doctor['surname2']) ? $doctor['surname2'] : '' }}">
                @endif
                <div class="main__container__card__text">
                    <p><b>{{ $doctor['name'] }} {{ $doctor['surname1'] }} {{ isset($doctor['surname2']) ? $doctor['surname2'] : '' }}</b></p>
                    <i>{{ $doctor['defensedate']?:'Date inconnue' }}</i>
                    <p data-type="unknownexactdate" style="display: none;">{{ $doctor['unknownexactdate'] }}</p>
                    <p>THÈSE: {{ $doctor['thesistitle'] ?: 'Inconnue' }}</p>
                </div>
            </a>
        @endforeach
    </div>
    <div class="main__pagination">
        @if(count($doctors) <= 0)
            <p>Aucun résultat trouvé</p>
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
                }}{{ 
                    request()->has('faculty') ? '&faculty=' . request()->get('faculty') : '' 
                }}">
                    <img src="{{ asset('img/arrow.svg') }}" alt="Page précédente">
                </a>
            @else
                <a class="disabled">
                    <img src="{{ asset('img/arrow.svg') }}" alt="Page précédente">
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
                }}{{ 
                    request()->has('faculty') ? '&faculty=' . request()->get('faculty') : '' 
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
                }}{{ 
                    request()->has('faculty') ? '&faculty=' . request()->get('faculty') : '' 
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
                }}{{ 
                    request()->has('faculty') ? '&faculty=' . request()->get('faculty') : '' 
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
                }}{{ 
                    request()->has('faculty') ? '&faculty=' . request()->get('faculty') : '' 
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
                }}{{ 
                    request()->has('faculty') ? '&faculty=' . request()->get('faculty') : '' 
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
                }}{{ 
                    request()->has('faculty') ? '&faculty=' . request()->get('faculty') : '' 
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
                }}{{ 
                    request()->has('faculty') ? '&faculty=' . request()->get('faculty') : '' 
                }}">
                    <img src="{{ asset('img/arrow.svg') }}" alt="Page suivante">
                </a>
            @else
                <a class="flip disabled">
                    <img src="{{ asset('img/arrow.svg') }}" alt="Page suivante">
                </a>
            @endif
        @endif
    </div>
@endsection
@include('layouts.common-fr')