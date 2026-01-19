@section('website-name')
Genealogía<br>Académica
@endsection

@section('to-introduction')
/fr
@endsection

@section('search')
Buscar
@endsection

@php
    $currentRouteName = Route::currentRouteName();
    $currentParams = request()->route()->parameters();
    $query = request()->query();
@endphp

@section('header-buttons')
    <button class="header_buttons--search" id="search-icon" type="submit">
        <img src="{{ asset('img/magnifyingglass.svg') }}" alt="icono de búsqueda" class="box-shadow">
    </button>
    <button class="header_buttons--close" id="close" type="button">
        <img src="{{ asset('img/cross.svg') }}" alt="icono de cierre de la barra de búsqueda" class="box-shadow">
    </button>
    @if(Auth::check())
    <a href="/fr/account" class="header_buttons--user">
    @else
    <a href="/fr/login" class="header_buttons--user">
    @endif
        <img src="{{ asset('img/user.svg') }}" alt="icono de usuario" class="box-shadow">
    </a>
    <button class="header_buttons--languages_selector" id="languages" type="button">
        <div class="header_buttons--languages_selector__languages">
            <a href="{{ route($currentRouteName, array_merge($currentParams, ['locale' => 'en'])) . (count($query) ? '?' . http_build_query($query) : '') }}"><img src="{{ asset('img/english.png') }}" alt="inglés"></a>
            <img src="{{ asset('img/french.png') }}" alt="francés" class="selected">
            <a href="{{ route($currentRouteName, array_merge($currentParams, ['locale' => 'es'])) . (count($query) ? '?' . http_build_query($query) : '') }}"><img src="{{ asset('img/spanish.png') }}" alt="español"></a>
        </div>
        <img src="{{ asset('img/caret-down.png') }}" alt="desplegar idiomas" class="header_buttons--dropdown box-shadow" id="select-language">
    </button>
@endsection

@section('form-content')
    @if(sizeof($errors) >= 1)
        <script>
            Toastify({
                text: "{{ str_contains(url()->previous(), 'card/edit') || str_contains(url()->previous(), 'create-card') ? 'Veuillez indiquer votre Prénom et Nom de famille' : 'Por favor, rellene todos los campos' }}",
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
                    background: "#DE1919",
                }
            }).showToast();
        </script>
    @endif
    <p>¿Tienes alguna cosa que quieras sugerir o preguntar? ¡No dudes en escribir!</p>
    <input id="name" name="name" value="{{ old('name') }}" class="@yield('faculty-color')" type="text" placeholder="Nombre completo">
    <input id="email" name="email" value="{{ old('email') }}" class="@yield('faculty-color')" type="email" placeholder="Dirección de correo">
    <input id="subject" name="subject" value="{{ old('subject') }}" class="@yield('faculty-color')" type="text" placeholder="Asunto">
    <textarea id="message" name="message" value="{{ old('message') }}" class="@yield('faculty-color')" placeholder="Mensaje" rows="11"></textarea>
@endsection

@section('submit-button-content')
Enviar mensaje a javier@unav.es
@endsection

@section('credits')
    <p>Idea original: <a href="https://linkedin.com/in/javierburguete">Javier Burguete</a> (javier@unav.es)</p>
    <hr class="separator">
    <p>Implementación web: <a href="https://linkedin.com/in/david-burguete">David Burguete</a></p>
    <hr class="separator">
    <p>Versión 2.0.0</p>
    <hr>
    <p>Universitas Studiorum Navarrensis</p>
@endsection