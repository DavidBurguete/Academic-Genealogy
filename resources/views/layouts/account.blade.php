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
    <link rel="stylesheet" href="{{ asset('css/account.css') }}">
    <title>{{ str_replace('<br>', ' ', trim($__env->yieldContent('website-name'))) }}</title>
</head>

<body>
    @php
        $currentParams = request()->route()->parameters();
    @endphp
    <a href="/{{ $currentParams['locale'] }}" class="logo">
        <img src="{{ asset('img/logoUNAV.svg') }}">
        <h1 id="title">@yield('website-name')</h1>
    </a>
    <form action="/{{ $currentParams['locale'] }}/account" method="POST">
        @yield('form')
    </form>
    <div class="languages">
        @yield('languages')
    </div>
</body>

</html>