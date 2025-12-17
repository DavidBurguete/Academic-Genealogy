@extends('layouts.app')

@section('css-js')
    <link rel="stylesheet" href="{{ asset('css/list.css') }}">
    <script src="{{ asset('js/date_formatter.js') }}"></script>
    <script src="{{ asset('js/redirect_faculty.js') }}"></script>
@endsection

@section('faculty-color')
{{ request()->has('faculty') ? request()->get('faculty') : 'sciences' }}
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
            Name 
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
            Thesis
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
        <hr>
        <a>Faculty filter:</a><select name="faculty" id="faculty">
            <option value="">-- Select an option --</option>
            <option {{ request()->get('faculty') == 'engineering-and-arquitecture' ? 'selected' : '' }} value="engineering-and-arquitecture">Engineering and Arquitecture</option>
            <option {{ request()->get('faculty') == 'sciences' ? 'selected' : '' }} value="sciences">Sciences</option>
            <option {{ request()->get('faculty') == 'law' ? 'selected' : '' }} value="law">Law</option>
            <option {{ request()->get('faculty') == 'communication' ? 'selected' : '' }} value="communication">Communication</option>
            <option {{ request()->get('faculty') == 'canon' ? 'selected' : '' }} value="canon">Canon Law</option>
            <option {{ request()->get('faculty') == 'philosophy-literature-education' ? 'selected' : '' }} value="philosophy-literature-education">Philosophy, Literature and Education</option>
            <option {{ request()->get('faculty') == 'economy' ? 'selected' : '' }} value="economy">Economy</option>
            <option {{ request()->get('faculty') == 'nursing' ? 'selected' : '' }} value="nursing">Nursing</option>
            <option {{ request()->get('faculty') == 'pharmacy-nutrition' ? 'selected' : '' }} value="pharmacy-nutrition">Pharmacy and Nutrition</option>
            <option {{ request()->get('faculty') == 'medicine' ? 'selected' : '' }} value="medicine">Medicine</option>
            <option {{ request()->get('faculty') == 'theology' ? 'selected' : '' }} value="theology">Theology</option>
            <option {{ request()->get('faculty') == 'unknown' ? 'selected' : '' }} value="unknown">Unknown</option>
        </select>
    </div>
    <div class="main__container">
        @foreach($doctors as $doctor)
            <a href="/en/card?id={{ $doctor['id'] }}" class="main__container__card main__container__card--{{ $doctor['faculty'] == '' ? 'unknown' : $doctor['faculty'] }}">
                @if(!$doctor['photo'])
                    <img src="{{ asset('portrait/NoPhoto.jpg') }}" alt="Missing portrait of doctor {{ $doctor['name'] }} {{ $doctor['surname1'] }}">
                @else
                    <img src="{{ asset('portrait/' . $doctor['photo']) }}" alt="Portrait of doctor {{ $doctor['name'] }} {{ $doctor['surname1'] }}">
                @endif
                <div class="main__container__card__text">
                    <p><b>{{ $doctor['name'] }} {{ $doctor['surname1'] }} {{ isset($doctor['surname2']) ? $doctor['surname2'] : '' }}</b></p>
                    <i>{{ $doctor['defensedate']?:'Unknown date' }}</i>
                    <p data-type="unknownexactdate" style="display: none;">{{ $doctor['unknownexactdate'] }}</p>
                    <p>THESIS: {{ $doctor['thesistitle'] ?: 'Unknown' }}</p>
                </div>
            </a>
        @endforeach
    </div>
    <div class="main__pagination">
        @if(count($doctors) <= 0)
            <p>There are no coincidences</p>
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
@include('layouts.common-en')