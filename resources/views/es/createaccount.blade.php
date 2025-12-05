@extends('layouts.app')

@section('css-js')
<link rel="stylesheet" href="{{ asset('css/createaccount.css') }}">
@endsection

@section('faculty-color')
sciences
@endsection

@section('nav')
<a>Sobre los directores</a>
<hr class="separator">
<a href="/es/methodology">Metodología</a>
<hr class="separator">
<a href="/es/history">Algo de historia</a>
<hr class="separator">
<a href="/es/list?page=1">Listado</a>
@endsection

@section('content')
    @if(isset($errors) && count($errors) > 0)
        <script>
            let errors = Object.values(@json($errors->toArray())).flat();
            let errorMessage = "";
            if(errors.findIndex(error => error.includes("require")) !== -1) {
                errorMessage = "Para crear un usuario, se requieren todos los campos";
            }
            else if(errors.findIndex(error => error.includes("character")) !== -1)  {
                errorMessage = "El usuario debe tener un mínimo de 5 caracteres y la contraseña un mínimo de 8";
            }
            else if(errors.findIndex(error => error.includes("selected")) !== -1)  {
                errorMessage = "El rol seleccionado no es un rol válido";
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
                text: "¡Usuario creado con éxito!",
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
    <form action="/es/account-created" method="POST">
        @csrf
        <h2>Crear nuevo usuario</h2>
        <input type="text" name="name" id="name" placeholder="Nombre de usuario" value="{{ old('name') }}">
        <input type="email" name="email" id="email" placeholder="Correo" value="{{ old('email') }}">
        <input type="text" name="password" id="password" placeholder="Contraseña" value="{{ old('password') }}">
        <select name="role" id="role">
            <option value="base" {{ old('role') === 'base' ? 'selected' : '' }}>Base</option>
            <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Administrador</option>
        </select>
        <button type="submit">Crear</button>
    </form>
@endsection
@include('layouts.common-es')