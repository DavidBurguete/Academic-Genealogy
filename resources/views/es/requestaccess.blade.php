@extends('layouts.account')
@section('website-name')
Genealogía<br>Académica
@endsection

@section('destination')
request-access
@endsection

@section('form')
    @if(sizeof($errors) >= 1)
        <script>
            Toastify({
                text: "Por favor, rellene todos los campos",
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
    <h2>Solicitud</h2>
    <input name="name" id="name" value="{{ old('name') }}" type="text" placeholder="Nombre completo">
    <input name="email" id="email" value="{{ old('email') }}" type="email" placeholder="Dirección de correo">
    <div class="actions">
        <a href="{{ url()->previous() }}">
            <img src="{{ asset('/img/return.svg') }}" alt="Botón de retroceso">
        </a>
        <button type="submit">Solicitar permiso</button>
    </div>
    <p>¿Ya tienes credenciales? <a href="/es/login">Iniciar sesión</a></p>
@endsection

@section('languages')
    <a><img src="{{ asset('img/spanish.png') }}" alt="español"></a>
    <a href="/en/request-access"><img src="{{ asset('img/english.png') }}" alt="inglés"></a>
    <a href="/fr/request-access"><img src="{{ asset('img/french.png') }}" alt="francés"></a>
@endsection