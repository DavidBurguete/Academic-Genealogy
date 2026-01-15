@extends('layouts.app')

@section('css-js')
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">
    <script type="module" src="{{ asset('js/date_formatter_cards_students.js') }}"></script>
    <script src="{{ asset('js/director_modification.js') }}"></script>
    <script src="{{ asset('js/student_modification.js') }}"></script>
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
    <form action="" method="POST">
        @csrf
        <div class="personal-info">
            <h2>
                <input placeholder="Name" class="{{ $doctor['faculty'] }}-underline" type="text" name="name" id="name" value="{{ $doctor['name'] }}">
                <input placeholder="Surname 1" class="{{ $doctor['faculty'] }}-underline" type="text" name="surname1" id="surname1" value="{{ $doctor['surname1'] }}">
                <input placeholder="Surname 2" class="{{ $doctor['faculty'] }}-underline" type="text" name="surname2" id="surname2" value="{{ isset($doctor['surname2']) ? $doctor['surname2'] : '' }}">
            </h2>
            <p class="life-date"><input type="date" name="birthdate" id="birthdate" value="{{ isset($doctor['birthdate']) ? $doctor['birthdate'] : '' }}"></p>
            <hr class="date-separator">
            <p class="life-date"><input type="date" name="deathdate" id="deathdate" value="{{ isset($doctor['deathdate']) ? $doctor['deathdate'] : '' }}"></p>
            @if(Auth()->check())
                <div class="card-manipulation">
                    <input type="submit" value="" title="Save changes">
                    <a href="/en/card?id={{ $doctor['id'] }}" class="discard" title="Discard changes"><img src="{{ asset('img/trash.svg') }}" alt="delete card"></a>
                </div>
            @endif
        </div>
        <div class="thesis">
            <img src="{{ isset($doctor['photo']) ? asset('portrait/' . $doctor['photo']) : asset('portrait/NoPhoto.jpg') }}" alt="Portrait of doctor {{ $doctor['name'] }} {{ $doctor['surname1'] }} {{ isset($doctor['surname2']) ? $doctor['surname2'] : '' }}">
            <div class="thesis__text">
                <h3><textarea placeholder="Thesis" class="{{ $doctor['faculty'] }}-underline" type="text" name="thesistitle" id="thesistitle">{{ isset($doctor['thesistitle']) ? $doctor['thesistitle'] : '' }}</textarea></h3>
                <i>Defended at 
                    <input placeholder="University" class="{{ $doctor['faculty'] }}-underline" type="text" name="university" id="university" value="{{ isset($doctor['university']) ? $doctor['university'] : '' }}">, 
                    <input placeholder="City" class="{{ $doctor['faculty'] }}-underline" type="text" name="city" id="city" value="{{ isset($doctor['city']) ? $doctor['city'] : '' }}">, 
                    <input class="{{ $doctor['faculty'] }}-underline" type="date" name="defensedate" id="defensedate" value="{{ isset($doctor['defensedate']) ? $doctor['defensedate'] : '' }}">
                </i>
                <fieldset id="unknownexactdate">
                    <label class="faculty-teseo" for="exact"><input type="radio" value="" id="exact" name="unknownexactdate" {{ $doctor['unknownexactdate'] == '' ? 'checked' : '' }}>Exact date</label>
                    <label class="faculty-teseo" for="unknowmonth"><input type="radio" value="month" id="unknowmonth" name="unknownexactdate" {{ $doctor['unknownexactdate'] == 'month' ? 'checked' : '' }}>Unknown month</label>
                    <label class="faculty-teseo" for="unknownday"><input type="radio" value="day" id="unknownday" name="unknownexactdate" {{ $doctor['unknownexactdate'] == 'day' ? 'checked' : '' }}>Unknown day</label>
                </fieldset>
                <p class="faculty-teseo">
                    Faculty of 
                    <select class="{{ $doctor['faculty'] }}-underline" name="faculty" id="faculty">
                        <option value="">-- Choose an option --</option>
                        <option {{ $doctor['faculty'] == 'engineering-and-arquitecture' ? 'selected' : '' }} value="engineering-and-arquitecture">Sciences</option>
                        <option {{ $doctor['faculty'] == 'sciences' ? 'selected' : '' }} value="sciences">Engineering and Arquitecture</option>
                        <option {{ $doctor['faculty'] == 'law' ? 'selected' : '' }} value="law">Law</option>
                        <option {{ $doctor['faculty'] == 'communication' ? 'selected' : '' }} value="communication">Communication</option>
                        <option {{ $doctor['faculty'] == 'canon' ? 'selected' : '' }} value="canon">Canon Law</option>
                        <option {{ $doctor['faculty'] == 'philosophy-literature-education' ? 'selected' : '' }} value="philosophy-literature-education">Philosophy, Literature and Education</option>
                        <option {{ $doctor['faculty'] == 'economy' ? 'selected' : '' }} value="economy">Economy</option>
                        <option {{ $doctor['faculty'] == 'nursing' ? 'selected' : '' }} value="nursing">Nursing</option>
                        <option {{ $doctor['faculty'] == 'pharmacy-nutrition' ? 'selected' : '' }} value="pharmacy-nutrition">Pharmacy and Nutrition</option>
                        <option {{ $doctor['faculty'] == 'medicine' ? 'selected' : '' }} value="medicine">Medicine</option>
                        <option {{ $doctor['faculty'] == 'theology' ? 'selected' : '' }} value="theology">Theology</option>
                        <option {{ $doctor['faculty'] == 'unknown' ? 'selected' : '' }} value="unknown">Unknown</option>
                    </select>
                </p>
                <p class="faculty-teseo">
                    TESEO: <input placeholder="id" class="{{ $doctor['faculty'] }}-underline" type="number" name="teseoid" id="teseoid" min="1" value="{{ isset($doctor['teseoid']) ? $doctor['teseoid'] : '' }}">
                </p>
                <hr>
                <h3 class="uppercase thesis__text__directors">Directors:</h3>
                @php
                    $i = 0;
                @endphp
                @foreach($directors as $director)
                    <p class="relations">
                        <select class="{{ $doctor['faculty'] }}-underline" name="directors[{{ $i }}]" id="director-{{ $i }}">
                            @foreach($fullRelativeDirectors as $fullRelativeDirector)
                                <option {{ $fullRelativeDirector['id'] ==  $director['id'] ? 'selected' : '' }} value="{{ $fullRelativeDirector['id'] }}">{{ $fullRelativeDirector['name'] }} {{ $fullRelativeDirector['surname1'] }} {{ isset($fullRelativeDirector['surname2']) ? $fullRelativeDirector['surname2'] : '' }}</option>
                            @endforeach
                        </select>
                        <label class="faculty-teseo" for="D-{{ $i }}">
                            <input type="radio" value="D" id="D-{{ $i }}" name="relationtypes[{{ $i }}]" {{ $director['relationtype'] == 'D' ? 'checked' : '' }}>
                            [ <span style="line-height: 1rem;">&Dscr;</span> ]
                        </label>
                        <label class="faculty-teseo" for="M-{{ $i }}">
                            <input type="radio" value="M" id="M-{{ $i }}" name="relationtypes[{{ $i }}]" {{ $director['relationtype'] == 'M' ? 'checked' : '' }}>
                            [ <span style="line-height: 1rem;">&Mscr;</span> ]
                        </label>
                        <button type="button" class="delete" data-type="delete">X</button>
                    </p>
                    @php
                        $i += 1;
                    @endphp
                @endforeach
                <button type="button" id="new-director">+ Add new director</button>
            </div>
            <p id="director-quantity" style="display: none;">{{ $i }}</p>
            <p id="directors-list" style="display: none;">
                {{ json_encode($fullRelativeDirectors) }}
            </p>
        </div>
        <br>
        <br>
        <h3 class="uppercase">Students:</h3>
        <ol id="students">
            @php
                $i = 0;
            @endphp
            @foreach($students as $student)
                <li class="relations">
                    <select class="{{ $doctor['faculty'] }}-underline" name="students[{{ $i }}]">
                        @foreach($fullRelativeStudents as $fullRelativeStudent)
                            <option {{ $fullRelativeStudent['id'] ==  $student['id'] ? 'selected' : '' }} value="{{ $fullRelativeStudent['id'] }}">{{ $fullRelativeStudent['name'] }} {{ $fullRelativeStudent['surname1'] }} {{ isset($fullRelativeStudent['surname2']) ? $fullRelativeStudent['surname2'] : '' }}</option>
                        @endforeach
                    </select>
                    <button type="button" class="delete" data-type="delete">X</button>
                </li>
                @php
                    $i += 1;
                @endphp
            @endforeach
            <button type="button" id="new-student">+ Add new student</button>
        </ol>
        <p id="student-quantity" style="display: none;">{{ $i }}</p>
        <p id="students-list" style="display: none;">
            {{ json_encode($fullRelativeStudents) }}
        </p>
    </form>
@endsection
@include('layouts.common-en')