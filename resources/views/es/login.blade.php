@extends('layouts.account')
@section('website-name')
Genealogía<br>Académica
@endsection

@section('destination')
account
@endsection

@section('form')
    @if(isset($error))
        <script>
            let errorType = "{{ $error }}";
            let error = "";
            switch (errorType) {
                case "FieldError": 
                    error = "Por favor, rellene los campos";
                    break;
                case "NameError": 
                    error = "El usuario especificado no existe";
                    break;
                case "PasswordError": 
                    error = "La contraseña es incorrecta";
                    break;
            }
            Toastify({
                text: error,
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
    <h2>Acceso</h2>
    <input name="name" id="name" type="text" autocomplete="off" placeholder="Nombre completo" value="{{ isset($request->name) ? $request->name : '' }}">
    <input name="password" id="password" type="password" autocomplete="off" placeholder="Contraseña" value="{{ isset($request->password) ? $request->password : '' }}">
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