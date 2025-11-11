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
@endphp

@section('header-buttons')
    <button class="header_buttons--search" id="search" type="submit">
        <img src="{{ asset('img/magnifyingglass.svg') }}" alt="search icon" class="box-shadow">
    </button>
    <button class="header_buttons--close" id="close" type="button">
        <img src="{{ asset('img/cross.svg') }}" alt="close search bar icon" class="box-shadow">
    </button>
    <a href="/login" class="header_buttons--user">
        <img src="{{ asset('img/user.svg') }}" alt="user icon" class="box-shadow">
    </a>
    <button class="header_buttons--languages_selector" id="languages" type="button">
        <div class="header_buttons--languages_selector__languages">
            <a href="{{ route($currentRouteName, array_merge($currentParams, ['locale' => 'es'])) }}"><img src="{{ asset('img/spanish.png') }}" alt="spanish language"></a>
            <img src="{{ asset('img/english.png') }}" alt="english language" class="selected">
            <a href="{{ route($currentRouteName, array_merge($currentParams, ['locale' => 'fr'])) }}"><img src="{{ asset('img/french.png') }}" alt="french language"></a>
        </div>
        <img src="{{ asset('img/caret-down.png') }}" alt="dropdown" class="header_buttons--dropdown box-shadow" id="select-language">
    </button>
@endsection

@section('form-content')
    <p>Do you have anything you'd like to suggest or ask? Don't hesitate to write!</p>
    <input id="name" type="text" autocomplete="off" placeholder="Full name">
    <input id="email" type="text" autocomplete="off" placeholder="Email address">
    <input id="subject" type="text" placeholder="Subject">
    <textarea id="message" placeholder="Message" rows="11"></textarea>
@endsection

@section('submit-button-content')
Send message to javier@unav.es
@endsection

@section('credits')
    <p>Created by Javier Burguete (v1.0.0)</p>
    <p>Improved by <a href="https://linkedin.com/in/david-burguete">David Burguete</a> (v2.0.0+)</p>
    <p>Version 2.0.0</p>
    <hr>
    <p>Universitas Studiorum Navarrensis</p>
@endsection