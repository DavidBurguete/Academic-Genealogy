@extends('layouts.app')

@section('css-js')
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">
    <script type="module" src="{{ asset('js/date_formatter_cards_students.js') }}"></script>
    <script src="{{ asset('js/director_modification.js') }}"></script>
    <script src="{{ asset('js/student_modification.js') }}"></script>
    <script src="{{ asset('js/file_storage.js') }}"></script>
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
    <form autocomplete="off" action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="personal-info">
            <h2>
                <input placeholder="Prénom" class="{{ $doctor['faculty'] }}-underline" type="text" name="name" id="name" value="{{ $doctor['name'] }}">
                <input placeholder="Nom 1" class="{{ $doctor['faculty'] }}-underline" type="text" name="surname1" id="surname1" value="{{ $doctor['surname1'] }}">
                <input placeholder="Nom 2" class="{{ $doctor['faculty'] }}-underline" type="text" name="surname2" id="surname2" value="{{ isset($doctor['surname2']) ? $doctor['surname2'] : '' }}">
            </h2>
            <p class="life-date"><input type="date" name="birthdate" id="birthdate" value="{{ isset($doctor['birthdate']) ? $doctor['birthdate'] : '' }}"></p>
            <hr class="date-separator">
            <p class="life-date"><input type="date" name="deathdate" id="deathdate" value="{{ isset($doctor['deathdate']) ? $doctor['deathdate'] : '' }}"></p>
            @if(Auth()->check())
                <div class="card-manipulation">
                    <input type="submit" value="" title="Sauver les modifications">
                    <a href="/fr/card?id={{ $doctor['id'] }}" class="discard" title="Effaçer les modifications"><img src="{{ asset('img/trash.svg') }}" alt="eliminar tarjeta"></a>
                </div>
            @endif
        </div>
        <div class="thesis">
            <div class="thesis__image">
                <span id="nonapplicablevalue" class="hidden error">La résolution de l'image n'est pas valide (elle doit être de 250 × 389 pixels)</span>
                <br id="portraittextsepparator" class="hidden">
                <span id="portraitname">Sélectionner l'image du docteur</span>
                <label id="portraitlabel" for="portrait" style="background-image: url({{ !$doctor['photo'] ? asset('portrait/NoPhoto.jpg') : asset('portrait/' . $doctor['photo']) }} );">
                    <input id="portrait" name="portrait" type="file" accept="image/png, image/jpeg">
                </label>
                <input id="portraitinputname" name="portraitinputname" type="hidden" value="{{ isset($doctor['photo']) ? $doctor['photo'] : '' }}">
                <button id="portraitremover" class="thesis__image--remove" type="button">Effacer l'image</button>
            </div>
            <div class="thesis__text">
                <h3><textarea placeholder="Thèse" class="{{ $doctor['faculty'] }}-underline" type="text" name="thesistitle" id="thesistitle">{{ isset($doctor['thesistitle']) ? $doctor['thesistitle'] : '' }}</textarea></h3>
                <i>Soutenue à l' 
                    <input placeholder="l'Université" class="{{ $doctor['faculty'] }}-underline" type="text" name="university" id="university" value="{{ isset($doctor['university']) ? $doctor['university'] : '' }}">, 
                    <input placeholder="Ville" class="{{ $doctor['faculty'] }}-underline" type="text" name="city" id="city" value="{{ isset($doctor['city']) ? $doctor['city'] : '' }}">, 
                    <input class="{{ $doctor['faculty'] }}-underline" type="date" name="defensedate" id="defensedate" value="{{ isset($doctor['defensedate']) ? $doctor['defensedate'] : '' }}">
                </i>
                <fieldset id="unknownexactdate">
                    <label class="faculty-teseo" for="exact"><input type="radio" value="" id="exact" name="unknownexactdate" {{ $doctor['unknownexactdate'] == '' ? 'checked' : '' }}>Date exacte</label>
                    <label class="faculty-teseo" for="unknowmonth"><input type="radio" value="month" id="unknowmonth" name="unknownexactdate" {{ $doctor['unknownexactdate'] == 'month' ? 'checked' : '' }}>Mois inconnu</label>
                    <label class="faculty-teseo" for="unknownday"><input type="radio" value="day" id="unknownday" name="unknownexactdate" {{ $doctor['unknownexactdate'] == 'day' ? 'checked' : '' }}>Jour inconnu</label>
                </fieldset>
                <p class="faculty-teseo">
                    Faculté de 
                    <select class="{{ $doctor['faculty'] }}-underline" name="faculty" id="faculty">
                        <option value="">-- Choisir une option --</option>
                        <option {{ $doctor['faculty'] == 'engineering-and-arquitecture' ? 'selected' : '' }} value="engineering-and-arquitecture">Ingénierie et Architecture</option>
                        <option {{ $doctor['faculty'] == 'sciences' ? 'selected' : '' }} value="sciences">Sciences</option>
                        <option {{ $doctor['faculty'] == 'law' ? 'selected' : '' }} value="law">Droit</option>
                        <option {{ $doctor['faculty'] == 'communication' ? 'selected' : '' }} value="communication">Communications</option>
                        <option {{ $doctor['faculty'] == 'canon' ? 'selected' : '' }} value="canon">Droit Canonique</option>
                        <option {{ $doctor['faculty'] == 'philosophy-literature-education' ? 'selected' : '' }} value="philosophy-literature-education">Philosophie, Littérature et Éducation</option>
                        <option {{ $doctor['faculty'] == 'economy' ? 'selected' : '' }} value="economy">Économie</option>
                        <option {{ $doctor['faculty'] == 'nursing' ? 'selected' : '' }} value="nursing">Soins Infirmiers</option>
                        <option {{ $doctor['faculty'] == 'pharmacy-nutrition' ? 'selected' : '' }} value="pharmacy-nutrition">Pharmacie et Nutrition</option>
                        <option {{ $doctor['faculty'] == 'medicine' ? 'selected' : '' }} value="medicine">Médecine</option>
                        <option {{ $doctor['faculty'] == 'theology' ? 'selected' : '' }} value="theology">Théologie</option>
                        <option {{ $doctor['faculty'] == 'unknown' ? 'selected' : '' }} value="unknown">Inconnu</option>
                    </select>
                </p>
                <p class="faculty-teseo">
                    TESEO: <input placeholder="id" class="{{ $doctor['faculty'] }}-underline" type="number" name="teseoid" id="teseoid" min="1" value="{{ isset($doctor['teseoid']) ? $doctor['teseoid'] : '' }}">
                </p>
                <hr>
                <h3 class="uppercase thesis__text__directors">Directeurs:</h3>
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
                <button type="button" id="new-director">+ Ajouter un nouveau directeur</button>
            </div>
            <p id="director-quantity" style="display: none;">{{ $i }}</p>
            <p id="directors-list" style="display: none;">
                {{ json_encode($fullRelativeDirectors) }}
            </p>
        </div>
        <br>
        <br>
        <h3 class="uppercase">Étudiants:</h3>
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
            <button type="button" id="new-student">+ Ajouter un nouvel étudiant</button>
        </ol>
        <p id="student-quantity" style="display: none;">{{ $i }}</p>
        <p id="students-list" style="display: none;">
            {{ json_encode($fullRelativeStudents) }}
        </p>
    </form>
@endsection
@include('layouts.common-fr')