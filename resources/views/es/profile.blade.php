@extends('layouts.app')

@section('css-js')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
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
<a href="/es/list">Listado</a>
@endsection

@section('content')
<a href="/es/logout"><img src="{{ asset('img/logout.svg') }}" alt="Icono de cierre de sesión"></a>
@endsection

@include('layouts.common-es')