<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logoUNAV.png" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Archivo' rel='stylesheet'>
    <script src="/js/toggle_burger_menu.js"></script>
    <script src="/js/change_language.js"></script>
    <script src="/js/toggle_search.js"></script>
    <script src="/js/hover-send.js"></script>
    @yield('css-js')
    <title>Genealogía académica</title>
</head>

<body>
    <header class="header @yield('faculty-color')">
        <div class="burger_menu box-shadow">
            <div class="burger_menu--first"></div>
            <div class="burger_menu--middle"></div>
            <div class="burger_menu--last"></div>
        </div>
        <a href="/" class="logo">
            <img src="img/logoUNAV.png">
            <h1 id="title">ACADEMIC GENEALOGY</h1>
        </a>
        <nav class="nav header--nav">
            @yield('nav')
        </nav>
        <form action="/search" method="post">
            <input type="text" name="search-bar" id="search-bar" class="search-bar box-shadow" placeholder="Search...">
            <div class="header_buttons">
                <div class="header_buttons--display" id="display"></div>
                <button class="header_buttons--search" id="search" type="submit">
                    <img src="img/magnifyingglass.svg" alt="search icon" class="box-shadow">
                </button>
                <button class="header_buttons--close collapse" id="close" type="button">
                    <img src="img/cross.svg" alt="close search bar icon" class="box-shadow">
                </button>
                <a href="/login" class="header_buttons--user">
                    <img src="img/user.svg" alt="user icon" class="box-shadow">
                </a>
                <button class="header_buttons--languages_selector" id="languages" type="button">
                    <div class="header_buttons--languages_selector__languages">
                        <img src="/img/spanish.png" alt="spanish language">
                        <img src="/img/english.png" alt="english language" class="selected">
                        <img src="/img/french.png" alt="french language">
                    </div>
                    <img src="/img/caret-down.png" alt="dropdown" class="header_buttons--dropdown box-shadow" id="select-language">
                </button>
            </div>
        </form>
        <nav class="nav deploy_nav--non_active" id="deployNav">
            @yield('nav')
            <div class="nav--campus">
        </nav>
    </header>


    <main class="main">
        @yield('content')
    </main>

    <footer>
        <form action="" method="post" class="suggest" id="suggest">
            <p>Do you have anything you'd like to suggest or ask? Dont' hesitate to write!</p>
            <input id="name" type="text" autocomplete="off" placeholder="Full name">
            <input id="email" type="text" autocomplete="off" placeholder="Email address">
            <input id="subject" type="text" placeholder="Subject">
            <textarea id="message" placeholder="Message" rows="11"></textarea>
            <input id="submit" type="submit" value="Send message to javier@unav.es" class="@yield('faculty-color')">
        </form>
        <div class="credits">
            <p>Created by Javier Burguete (v1.0.0)</p>
            <p>Improved by <a href="https://linkedin.com/in/david-burguete">David Burguete</a> (v2.0.0+)</p>
            <p>Version 2.0.0</p>
            <hr>
            <p>Universitas Studiorum Navarrensis</p>
        </div>
    </footer>
</body>

</html>