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
                <input placeholder="Prénom" class="sciences-underline" type="text" name="name" id="name">
                <input placeholder="Nom 1" class="sciences-underline" type="text" name="surname1" id="surname1">
                <input placeholder="Nom 2" class="sciences-underline" type="text" name="surname2" id="surname2">
            </h2>
            <p class="life-date"><input type="date" name="birthdate" id="birthdate"></p>
            <hr class="date-separator">
            <p class="life-date"><input type="date" name="deathdate" id="deathdate"></p>
            @if(Auth()->check())
                <div class="card-manipulation">
                    <input type="submit" value="" title="Sauver la fiche">
                    <a href="/fr/list?page=1" class="discard" title="Effaçer la fiche"><img src="{{ asset('img/trash.svg') }}" alt="eliminar tarjeta"></a>
                </div>
            @endif
        </div>
        <div class="thesis">
            <div class="thesis__image">
                <span id="nonapplicablevalue" class="hidden error">La résolution de l'image n'est pas valide (elle doit être de 250 × 389 pixels)</span>
                <br id="portraittextsepparator" class="hidden">
                <span id="portraitname">Sélectionner l'image du docteur</span>
                <label id="portraitlabel" for="portrait" style="background-image: url({{ asset('portrait/NoPhoto.jpg') }});">
                    <input id="portrait" name="portrait" type="file" accept="image/png, image/jpeg">
                </label>
                <input id="portraitinputname" name="portraitinputname" type="hidden" value="{{ isset($doctor['photo']) ? $doctor['photo'] : '' }}">
                <button id="portraitremover" class="thesis__image--remove" type="button">Effacer l'image</button>
            </div>
            <div class="thesis__text">
                <h3><textarea placeholder="Thèse" class="sciences-underline" type="text" name="thesistitle" id="thesistitle"></textarea></h3>
                <i>Soutenue à l'
                    <input placeholder="Université" class="sciences-underline" type="text" name="university" id="university">, 
                    <input placeholder="Ville" class="sciences-underline" type="text" name="city" id="city">, 
                    <input class="sciences-underline" type="date" name="defensedate" id="defensedate">
                </i>
                <fieldset id="unknownexactdate">
                    <label class="faculty-teseo" for="exact"><input type="radio" value="" id="exact" name="unknownexactdate" checked>Date exacte</label>
                    <label class="faculty-teseo" for="unknowmonth"><input type="radio" value="month" id="unknowmonth" name="unknownexactdate">Mois inconnu</label>
                    <label class="faculty-teseo" for="unknownday"><input type="radio" value="day" id="unknownday" name="unknownexactdate">Jour inconnu</label>
                </fieldset>
                <p class="faculty-teseo">
                    Faculté de 
                    <select class="sciences-underline" name="faculty" id="faculty">
                        <option value="">-- Choisir une option --</option>
                        <option value="engineering-and-arquitecture">Ingénierie et Architecture</option>
                        <option value="sciences">Sciences</option>
                        <option value="law">Droit</option>
                        <option value="communication">Communications</option>
                        <option value="canon">Droit Canonique</option>
                        <option value="philosophy-literature-education">Philosophie, Littérature et Éducation</option>
                        <option value="economy">Économie</option>
                        <option value="nursing">Soins Infirmiers</option>
                        <option value="pharmacy-nutrition">Pharmacie et Nutrition</option>
                        <option value="medicine">Médecine</option>
                        <option value="theology">Théologie</option>
                        <option value="unknown">Inconnu</option>
                    </select>
                </p>
                <p class="faculty-teseo">
                    TESEO: <input placeholder="id" class="sciences-underline" type="number" name="teseoid" id="teseoid" min="1">
                </p>
                <hr>
                <h3 class="uppercase thesis__text__directors">Directeurs:</h3>
                <button type="button" id="new-director">+ Ajouter un nouveau directeur</button>
            </div>
        </div>
        <br>
        <br>
        <h3 class="uppercase">Étudiants:</h3>
        <ol id="students">
            <button type="button" id="new-student">+ Ajouter un nouvel étudiant</button>
        </ol>
        <p id="everyone-list" style="display: none;">
            {{ json_encode($everyone) }}
        </p>
    </form>
@endsection
@include('layouts.common-fr')