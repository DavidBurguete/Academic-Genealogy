@section('website-name')
Genealogía<br>Académica
@endsection

@section('to-introduction')
/es
@endsection

@section('search')
Buscar
@endsection

@php
    $currentRouteName = Route::currentRouteName();
    $currentParams = request()->route()->parameters();
@endphp

@section('header-buttons')
    <button class="header_buttons--search" id="search" type="submit">
        <img src="{{ asset('img/magnifyingglass.svg') }}" alt="icono de búsqueda" class="box-shadow">
    </button>
    <button class="header_buttons--close" id="close" type="button">
        <img src="{{ asset('img/cross.svg') }}" alt="icono de cierre de la barra de búsqueda" class="box-shadow">
    </button>
    <a href="/login" class="header_buttons--user">
        <img src="{{ asset('img/user.svg') }}" alt="icono de usuario" class="box-shadow">
    </a>
    <button class="header_buttons--languages_selector" id="languages" type="button">
        <div class="header_buttons--languages_selector__languages">
            <a href="{{ route($currentRouteName, array_merge($currentParams, ['locale' => 'en'])) }}"><img src="{{ asset('img/english.png') }}" alt="inglés"></a>
            <img src="{{ asset('img/spanish.png') }}" alt="español" class="selected">
            <a href="{{ route($currentRouteName, array_merge($currentParams, ['locale' => 'fr'])) }}"><img src="{{ asset('img/french.png') }}" alt="francés"></a>
        </div>
        <img src="{{ asset('img/caret-down.png') }}" alt="desplegar idiomas" class="header_buttons--dropdown box-shadow" id="select-language">
    </button>
@endsection

@section('form-content')
    <p>¿Tienes alguna cosa que quieras sugerir o preguntar? ¡No dudes en escribir!</p>
    <input id="name" type="text" autocomplete="off" placeholder="Nombre completo">
    <input id="email" type="email" autocomplete="off" placeholder="Dirección de correo">
    <input id="subject" type="text" placeholder="Asunto">
    <textarea id="message" placeholder="Mensaje" rows="11"></textarea>
@endsection

@section('submit-button-content')
Enviar mensaje a javier@unav.es
@endsection

@section('credits')
    <p>Creado por <a href="https://linkedin.com/in/javierburguete">Javier Burguete</a> (v1.0.0)</p>
    <hr class="separator">
    <p>Mejorado por <a href="https://linkedin.com/in/david-burguete">David Burguete</a> (v2.0.0+)</p>
    <hr class="separator">
    <p>Versión 2.0.0</p>
    <hr>
    <p>Universitas Studiorum Navarrensis</p>
@endsection