@extends('layouts.app')

@section('css-js')
<link rel="stylesheet" href="{{ asset('css/createaccount.css') }}">
@endsection

@section('faculty-color')
sciences
@endsection

@section('nav')
<a href="/en/about-directors">About the directors</a>
<hr class="separator">
<a href="/en/methodology">Methodology</a>
<hr class="separator">
<a href="/en/history">A bit of history</a>
<hr class="separator">
<a href="/en/list?page=1">List of doctors</a>
@endsection

@section('content')
    @if(isset($errors) && count($errors) > 0)
        <script>
            let errors = Object.values(@json($errors->toArray())).flat();
            let errorMessage = "";
            if(errors.findIndex(error => error.includes("require")) !== -1) {
                errorMessage = "To create a user, all fields are required";
            }
            else if(errors.findIndex(error => error.includes("character")) !== -1)  {
                errorMessage = "The user must have a minimum of 5 characters and the password a minimum of 8";
            }
            else if(errors.findIndex(error => error.includes("selected")) !== -1)  {
                errorMessage = "The selected role is not valid";
            }
            else {
                errorMessage = "An error ocurred. Please, try again";
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
                text: "User created successfully!",
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
    <form autocomplete="off" action="/en/account-created" method="POST">
        @csrf
        <h2>Create new user</h2>
        <input type="text" name="name" id="name" placeholder="User name" value="{{ old('name') }}">
        <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
        <input type="text" name="password" id="password" placeholder="Password" value="{{ old('password') }}">
        <select name="role" id="role">
            <option value="base" {{ old('role') === 'base' ? 'selected' : '' }}>Base</option>
            <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Administrator</option>
        </select>
        <button type="submit">Create</button>
    </form>
@endsection
@include('layouts.common-en')