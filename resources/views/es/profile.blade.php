@extends('layouts.app')

@section('css-js')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<script src="{{ asset('js/show-password.js') }}"></script>
<script src="{{ asset('js/toggleDeleteAccountModal.js') }}"></script>
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
<a href="/es/list?page=1">Listado</a>
@endsection

@section('content')

    @if(isset($error))
        <script>
            let errors = Object.values(@json($error->errors())).flat();
            let errorMessage = "";
            if(errors.findIndex(error => error.includes("require")) !== -1) {
                errorMessage = "Por favor, si quiere cambiar la contraseña, rellene ambos campos";
            }
            else if(errors.findIndex(error => error.includes("character")) !== -1)  {
                errorMessage = "La contraseña debe tener un mínimo de 8 caracteres";
            }
            else if(errors.findIndex(error => error.includes("PasswordError")) !== -1)  {
                errorMessage = "Las constraseñas deben coincidir";
            }
            else {
                errorMessage = "Ha ocurrido un error. Por favor, inténtelo otra vez";
            }
            Toastify({
                text: errorMessage,
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
    @if(isset($success))
        <script>
            Toastify({
                text: "La contraseña ha sido actualizada",
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
                    background: "#06EF38",
                }
            }).showToast();
        </script>
    @endif
    <img src="{{ asset('img/backgroundUNAV.jpg') }}">
    <div class="main__content">
        @if(hasRoleAtLeast($user->role, "admin"))
            <div class="main__content__actions">
                <a href="/es/create-account"><button>Crear nueva cuenta<br>de usuario</button></a>
                <a href="/es/logout"><img src="{{ asset('img/logout.svg') }}" alt="Icono de cierre de sesión"></a>
            </div>
        @else
            <a href="/es/logout"><img src="{{ asset('img/logout.svg') }}" alt="Icono de cierre de sesión"></a>
        @endif
        <form action="/es/change-password" method="POST" class="main__content__info">
            @csrf
            @method('PUT')
            <input type="text" name="name" id="name" value="{{ $user->name }} &nbsp;—&nbsp; {{ $user->email }}" disabled>
            <hr>
            <input value="{{ isset($passwords[0]) ? $passwords[0] : '' }}" type="password" name="password" id="password" placeholder="Nueva contraseña">
            <input value="{{ isset($passwords[1]) ? $passwords[1] : '' }}" type="password" name="confirm-password" id="confirm-password" placeholder="Confirmar nueva contraseña">
            <button type="submit" class="main__content__info--change">Cambiar contraseña</button>
            <button class="main__content__info--delete" type="button" id="deleteAccountButton">Eliminar cuenta</button>
            <button class="main__content__info--show" type="button" id="show">
                <img src="{{ asset('/img/closedeye.svg') }}" alt="mostrar contraseña" id="closed">
                <img src="{{ asset('/img/openeye.svg') }}" alt="esconder contraseña" id="open" class="hidden">
            </button>
        </form>
    </div>
    <div class="main__modal" id="deleteAccountModal">
        <h2>Eliminar cuenta</h2>
        <hr>
        <p>
            Estás a punto de eliminar <b>definitivamente</b> tu cuenta. ¿Estás seguro de la decisión?
            Esta acción no se puede deshacer, y se hará efectiva inmediatamente después de aceptar
        </p>
        <form action="/es/delete-account" method="POST" class="main__modal__actions">
            <button type="button" id="closeModal">No, conservar la cuenta</button>
            @csrf
            <button type="submit">Si, eliminar</button>
        </form>
    </div>
@endsection

@include('layouts.common-es')