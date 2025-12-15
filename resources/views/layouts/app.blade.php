<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/logoUNAV.png') }}" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Archivo' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="{{ asset('js/toggle_burger_menu.js') }}"></script>
    <script src="{{ asset('js/change_language.js') }}"></script>
    <script src="{{ asset('js/toggle_search.js') }}"></script>
    <script src="{{ asset('js/hover-send.js') }}"></script>
    @yield('css-js')
    <title>{{ str_replace('<br>', ' ', trim($__env->yieldContent('website-name'))) }}</title>
</head>

<body>
    <header class="header @yield('faculty-color')">
        <div class="burger_menu box-shadow">
            <div class="burger_menu--first"></div>
            <div class="burger_menu--middle"></div>
            <div class="burger_menu--last"></div>
        </div>
        <a href="@yield('to-introduction')" class="logo gradient-@yield('faculty-color')">
            <img src="{{ asset('img/logoUNAV.svg') }}">
            <h1 id="title">@yield('website-name')</h1>
        </a>
        <nav class="nav header--nav">
            @yield('nav')
        </nav>
        @php
            $currentParams = request()->route()->parameters();
        @endphp
        <form action="/{{ $currentParams['locale'] }}/search" method="get">
            <input type="text" name="page" value="1" style="display: none;">
            <input type="text" name="search" id="search" class="search box-shadow" placeholder="@yield('search')...">
            <div class="header_buttons">
                <div class="header_buttons--display" id="display"></div>
                @yield('header-buttons')
            </div>
        </form>
        <nav class="nav deploy_nav--non_active" id="deployNav">
            @yield('nav')
            <div class="nav--campus">
        </nav>
        <div class="header__background gradient-@yield('faculty-color')">
        </div>
    </header>


    <main class="main">
        @yield('content')
    </main>

    <footer>
        <form action="/suggest" method="post" class="suggest" id="suggest">
            @csrf
            <div>
                @yield('form-content')
                <input id="submit" type="submit" value="@yield('submit-button-content')" class="@yield('faculty-color')">
            </div>
        </form>
        <div class="credits">
            @yield('credits')
        </div>
    </footer>
</body>

</html>