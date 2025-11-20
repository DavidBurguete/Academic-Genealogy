@extends('layouts.account')
@section('website-name')
Genealogía<br>Académica
@endsection

@section('form')
    <h2>Acceso</h2>
    <input id="name" type="text" autocomplete="off" placeholder="Nombre completo">
    <input id="password" type="password" autocomplete="off" placeholder="Contraseña">
    <div class="actions">
        <a href="{{ url()->previous() }}">
            <img src="{{ asset('/img/return.svg') }}" alt="Botón de retroceso">
        </a>
        <button type="submit">Iniciar sesión</button>
    </div>
    <p>¿Eres doctor o profesor y quieres acceso? <a href="/es/request-access">Solicítalo aquí</a></p>
@endsection

@section('languages')
    <a><img src="{{ asset('img/spanish.png') }}" alt="español"></a>
    <a href="/en/login"><img src="{{ asset('img/english.png') }}" alt="inglés"></a>
    <a href="/fr/login"><img src="{{ asset('img/french.png') }}" alt="francés"></a>
@endsection