@extends('layouts.app')

@section('css-js')
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">
    <script type="module" src="{{ asset('js/date_formatter_cards_students.js') }}"></script>
    <script src="{{ asset('js/director_modification.js') }}"></script>
    <script src="{{ asset('js/student_modification.js') }}"></script>
    <script src="{{ asset('js/file_storage.js') }}"></script>
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
    <a href="/en/list?page=1">List of doctors</a>
@endsection

@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="personal-info">
            <h2>
                <input placeholder="Name" class="sciences-underline" type="text" name="name" id="name">
                <input placeholder="Surname 1" class="sciences-underline" type="text" name="surname1" id="surname1">
                <input placeholder="Surname 2" class="sciences-underline" type="text" name="surname2" id="surname2">
            </h2>
            <p class="life-date"><input type="date" name="birthdate" id="birthdate"></p>
            <hr class="date-separator">
            <p class="life-date"><input type="date" name="deathdate" id="deathdate"></p>
            @if(Auth()->check())
                <div class="card-manipulation">
                    <input type="submit" value="" title="Save card">
                    <a href="/en/list?page=1" class="discard" title="Discard card"><img src="{{ asset('img/trash.svg') }}" alt="Discard card"></a>
                </div>
            @endif
        </div>
        <div class="thesis">
            <label id="portraitlabel" for="portrait" style="background-image: url({{ asset('portrait/NoPhoto.jpg') }});">
                <span id="nonapplicablevalue" class="hidden error">The image resolution isn't valid (must be 250 × 389 pixels)</span>
                <br id="portraittextsepparator" class="hidden">
                <span id="portraitname">Select image of the doctor</span>
                <input id="portrait" name="portrait" type="file" accept="image/png, image/jpeg">
            </label>
            <div class="thesis__text">
                <h3><textarea placeholder="Thesis" class="sciences-underline" type="text" name="thesistitle" id="thesistitle"></textarea></h3>
                <i>Defendida en 
                    <input placeholder="University" class="sciences-underline" type="text" name="university" id="university">, 
                    <input placeholder="City" class="sciences-underline" type="text" name="city" id="city">, 
                    <input class="sciences-underline" type="date" name="defensedate" id="defensedate">
                </i>
                <fieldset id="unknownexactdate">
                    <label class="faculty-teseo" for="exact"><input type="radio" value="" id="exact" name="unknownexactdate" checked>Exact date</label>
                    <label class="faculty-teseo" for="unknowmonth"><input type="radio" value="month" id="unknowmonth" name="unknownexactdate">Unknown month</label>
                    <label class="faculty-teseo" for="unknownday"><input type="radio" value="day" id="unknownday" name="unknownexactdate">Unknown day</label>
                </fieldset>
                <p class="faculty-teseo">
                    Facultad de 
                    <select class="sciences-underline" name="faculty" id="faculty">
                        <option value="">-- Choose an option --</option>
                        <option value="engineering-and-arquitecture">Sciences</option>
                        <option value="sciences">Engineering and Arquitecture</option>
                        <option value="law">Law</option>
                        <option value="communication">Communication</option>
                        <option value="canon">Canon Law</option>
                        <option value="philosophy-literature-education">Philosophy, Literature and Education</option>
                        <option value="economy">Economy</option>
                        <option value="nursing">Nursing</option>
                        <option value="pharmacy-nutrition">Pharmacy and Nutrition</option>
                        <option value="medicine">Medicine</option>
                        <option value="theology">Theology</option>
                        <option value="unknown">Unknown</option>
                    </select>
                </p>
                <p class="faculty-teseo">
                    TESEO: <input placeholder="id" class="sciences-underline" type="number" name="teseoid" id="teseoid" min="1">
                </p>
                <hr>
                <h3 class="uppercase thesis__text__directors">Directors:</h3>
                <button type="button" id="new-director">+ Add new director</button>
            </div>
        </div>
        <br>
        <br>
        <h3 class="uppercase">Students:</h3>
        <ol id="students">
            <button type="button" id="new-student">+ Add new student</button>
        </ol>
        <p id="everyone-list" style="display: none;">
            {{ json_encode($everyone) }}
        </p>
    </form>
@endsection
@include('layouts.common-en')