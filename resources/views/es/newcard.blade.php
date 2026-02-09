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
    <a href="/es/about-directors">Sobre los directores</a>
    <hr class="separator">
    <a href="/es/methodology">Metodología</a>
    <hr class="separator">
    <a href="/es/history">Algo de historia</a>
    <hr class="separator">
    <a href="/es/list?page=1">Listado</a>
@endsection

@section('content')
    <form autocomplete="off" action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="personal-info">
            <h2>
                <input placeholder="Nombre" class="sciences-underline" type="text" name="name" id="name">
                <input placeholder="Apellido 1" class="sciences-underline" type="text" name="surname1" id="surname1">
                <input placeholder="Apellido 2" class="sciences-underline" type="text" name="surname2" id="surname2">
            </h2>
            <p class="life-date"><input type="date" name="birthdate" id="birthdate"></p>
            <hr class="date-separator">
            <p class="life-date"><input type="date" name="deathdate" id="deathdate"></p>
            @if(Auth()->check())
                <div class="card-manipulation">
                    <input type="submit" value="" title="Guardar tarjeta">
                    <a href="/es/list?page=1" class="discard" title="Descartar tarjeta"><img src="{{ asset('img/trash.svg') }}" alt="eliminar tarjeta"></a>
                </div>
            @endif
        </div>
        <div class="thesis">
            <div class="thesis__image">
                <span id="nonapplicablevalue" class="hidden error">La resolución de la imagen no es válida (debe ser 250 × 389 píxeles)</span>
                <br id="portraittextsepparator" class="hidden">
                <span id="portraitname">Seleccionar imagen del doctor</span>
                <label id="portraitlabel" for="portrait" style="background-image: url({{ asset('portrait/NoPhoto.jpg') }});">
                    <input id="portrait" name="portrait" type="file" accept="image/png, image/jpeg">
                </label>
                <input id="portraitinputname" name="portraitinputname" type="hidden" value="{{ isset($doctor['photo']) ? $doctor['photo'] : '' }}">
                <button id="portraitremover" class="thesis__image--remove" type="button">Eliminar imagen</button>
            </div>
            <div class="thesis__text">
                <h3><textarea placeholder="Tesis" class="sciences-underline" type="text" name="thesistitle" id="thesistitle"></textarea></h3>
                <i>Defendida en 
                    <input placeholder="Universidad" class="sciences-underline" type="text" name="university" id="university">, 
                    <input placeholder="Ciudad" class="sciences-underline" type="text" name="city" id="city">, 
                    <input class="sciences-underline" type="date" name="defensedate" id="defensedate">
                </i>
                <fieldset id="unknownexactdate">
                    <label class="faculty-teseo" for="exact"><input type="radio" value="" id="exact" name="unknownexactdate" checked>Fecha exacta</label>
                    <label class="faculty-teseo" for="unknowmonth"><input type="radio" value="month" id="unknowmonth" name="unknownexactdate">Mes desconocido</label>
                    <label class="faculty-teseo" for="unknownday"><input type="radio" value="day" id="unknownday" name="unknownexactdate">Día desconocido</label>
                </fieldset>
                <p class="faculty-teseo">
                    Facultad de 
                    <select class="sciences-underline" name="faculty" id="faculty">
                        <option value="">-- Selecciona una opción --</option>
                        <option value="engineering-and-arquitecture">Ingeniería y Arquitectura</option>
                        <option value="sciences">Ciencias</option>
                        <option value="law">Derecho</option>
                        <option value="communication">Comunicaciones</option>
                        <option value="canon">Derecho Canónico</option>
                        <option value="philosophy-literature-education">Filosofía, Literatura y Educación</option>
                        <option value="economy">Economía</option>
                        <option value="nursing">Enfermería</option>
                        <option value="pharmacy-nutrition">Farmacia y Nutrición</option>
                        <option value="medicine">Medicina</option>
                        <option value="theology">Teología</option>
                        <option value="unknown">Desconocido</option>
                    </select>
                </p>
                <p class="faculty-teseo">
                    TESEO: <input placeholder="id" class="sciences-underline" type="number" name="teseoid" id="teseoid" min="1">
                </p>
                <hr>
                <h3 class="uppercase thesis__text__directors">Directores:</h3>
                <button type="button" id="new-director">+ Añadir nuevo director</button>
            </div>
        </div>
        <br>
        <br>
        <h3 class="uppercase">Estudiantes:</h3>
        <ol id="students">
            <button type="button" id="new-student">+ Añadir nuevo estudiante</button>
        </ol>
        <p id="everyone-list" style="display: none;">
            {{ json_encode($everyone) }}
        </p>
    </form>
@endsection
@include('layouts.common-es')