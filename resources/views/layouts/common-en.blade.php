@section('website-name')
Academic<br>Genealogy
@endsection

@section('to-introduction')
/en
@endsection

@section('search')
Search
@endsection

@php
    $currentRouteName = Route::currentRouteName();
    $currentParams = request()->route()->parameters();
    $query = request()->query();
@endphp

@section('header-buttons')
    <button class="header_buttons--search" id="search-icon" type="submit">
        <img src="{{ asset('img/magnifyingglass.svg') }}" alt="search icon" class="box-shadow">
    </button>
    <button class="header_buttons--close" id="close" type="button">
        <img src="{{ asset('img/cross.svg') }}" alt="close search bar icon" class="box-shadow">
    </button>
    @if(Auth::check())
    <a href="/en/account" class="header_buttons--user">
    @else
    <a href="/en/login" class="header_buttons--user">
    @endif
        <img src="{{ asset('img/user.svg') }}" alt="user icon" class="box-shadow">
    </a>
    <button class="header_buttons--languages_selector" id="languages" type="button">
        <div class="header_buttons--languages_selector__languages">
            <a href="{{ route($currentRouteName, array_merge($currentParams, ['locale' => 'es'])) . (count($query) ? '?' . http_build_query($query) : '') }}"><img src="{{ asset('img/spanish.png') }}" alt="spanish language"></a>
            <img src="{{ asset('img/english.png') }}" alt="english language" class="selected">
            <a href="{{ route($currentRouteName, array_merge($currentParams, ['locale' => 'fr'])) . (count($query) ? '?' . http_build_query($query) : '') }}"><img src="{{ asset('img/french.png') }}" alt="french language"></a>
        </div>
        <img src="{{ asset('img/caret-down.png') }}" alt="dropdown" class="header_buttons--dropdown box-shadow" id="select-language">
    </button>
@endsection

@section('form-content')
    @if(sizeof($errors) >= 1)
        <script>
            Toastify({
                text: "Please, fill in all the fields",
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
    <p>Do you have anything you'd like to suggest or ask? Don't hesitate to write!</p>
    <input id="name" name="name" value="{{ old('name') }}" class="@yield('faculty-color')" type="text" placeholder="Full name">
    <input id="email" name="email" value="{{ old('email') }}" class="@yield('faculty-color')" type="email" placeholder="Email address">
    <input id="subject" name="subject" value="{{ old('subject') }}" class="@yield('faculty-color')" type="text" placeholder="Subject">
    <textarea id="message" name="message" value="{{ old('message') }}" class="@yield('faculty-color')" placeholder="Message" rows="11"></textarea>
@endsection

@section('submit-button-content')
Send message to javier@unav.es
@endsection

@section('credits')
    <p>Original idea: <a href="https://linkedin.com/in/javierburguete">Javier Burguete</a> (javier@unav.es)</p>
    <hr class="separator">
    <p>Web implementation: <a href="https://linkedin.com/in/david-burguete">David Burguete</a></p>
    <hr class="separator">
    <p>Version 2.0.0</p>
    <hr>
    <p>Universitas Studiorum Navarrensis</p>
@endsection