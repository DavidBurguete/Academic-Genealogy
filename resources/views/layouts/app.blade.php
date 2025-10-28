<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logoUNAV.png" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
    <script src="js/toggle_burger_menu.js"></script>
    <script src="js/change_language.js"></script>
    <script src="js/toggle_search.js"></script>
    @yield('css-js')
    <title>Genealogía académica</title>
</head>

<body>
    <header class="header">
        <div class="burger_menu">
            <div class="burger_menu--first"></div>
            <div class="burger_menu--middle"></div>
            <div class="burger_menu--last"></div>
        </div>
        <a href="/" class="logo">
            <img src="img/logoUNAV.png">
            <h1 id="title">ACADEMIC GENEALOGY</h1>
        </a>
        <input type="text" name="search-bar" id="search-bar" class="search-bar" placeholder="Search...">
        <nav class="nav header--nav">
            @yield('nav')
        </nav>
        <div class="header_buttons">
            <button class="header_buttons--search" id="search">
                <img src="img/magnifyingglass.svg" alt="magnifying glass icon">
            </button>
            <button class="header_buttons--user">
                <img src="img/user.svg" alt="user icon">
            </button>
            <button class="header_buttons--languages_selector" id="languages">
                <div class="header_buttons--languages_selector__languages">
                    <img src="/img/spanish.png" alt="spanish language" class="not-selected1 not-selected-collapsed">
                    <img src="/img/english.png" alt="english language" class="selected">
                    <img src="/img/french.png" alt="french language" class="not-selected2 not-selected-collapsed">
                </div>
                <img src="/img/caret-down.png" alt="dropdown" class="header_buttons--dropdown" id="select-language">
            </button>
        </div>
    </header>
    <nav class="nav deploy_nav--non_active" id="deployNav">
        @yield('nav')
        <div class="nav--campus">
    </nav>
    <main>
        @yield('content')
    </main>
</body>

</html>