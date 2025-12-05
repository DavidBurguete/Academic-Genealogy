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
<a href="/en/about-directors">About the directors</a>
<hr class="separator">
<a href="/en/methodology">Methodology</a>
<hr class="separator">
<a href="/en/history">A bit of history</a>
<hr class="separator">
<a href="/en/list?page=1">List of doctors</a>
@endsection

@section('content')

    @if(isset($error))
        <script>
            let errors = Object.values(@json($error->errors())).flat();
            let errorMessage = "";
            if(errors.findIndex(error => error.includes("require")) !== -1) {
                errorMessage = "Please, if you want to change the password, fill in the fields";
            }
            else if(errors.findIndex(error => error.includes("character")) !== -1)  {
                errorMessage = "The password must have a minimum of 8 characters";
            }
            else if(errors.findIndex(error => error.includes("PasswordError")) !== -1)  {
                errorMessage = "Both passwords must be equal";
            }
            else {
                errorMessage = "There was an error. Please, try again";
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
                text: "The password has been updated",
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
                <a href="/en/create-account"><button>Create new user<br>account</button></a>
                <a href="/en/logout"><img src="{{ asset('img/logout.svg') }}" alt="Logout icon"></a>
            </div>
        @else
            <a href="/en/logout"><img src="{{ asset('img/logout.svg') }}" alt="Logout icon"></a>
        @endif
        <form action="/en/change-password" method="POST" class="main__content__info">
            @csrf
            @method('PUT')
            <input type="text" name="name" id="name" value="{{ $user->name }} &nbsp;—&nbsp; {{ $user->email }}" disabled>
            <hr>
            <input value="{{ isset($passwords[0]) ? $passwords[0] : '' }}" type="password" name="password" id="password" placeholder="New password">
            <input value="{{ isset($passwords[1]) ? $passwords[1] : '' }}" type="password" name="confirm-password" id="confirm-password" placeholder="Confirm new password">
            <button type="submit" class="main__content__info--change">Change password</button>
            <button class="main__content__info--delete" type="button" id="deleteAccountButton">Delete account</button>
            <button class="main__content__info--show" type="button" id="show">
                <img src="{{ asset('/img/closedeye.svg') }}" alt="show password" id="closed">
                <img src="{{ asset('/img/openeye.svg') }}" alt="hide password" id="open" class="hidden">
            </button>
        </form>
    </div>
    <div class="main__modal" id="deleteAccountModal">
        <h2>Delete account</h2>
        <hr>
        <p>
            You are about to delete your account <b>for good</b>. Are you sure about the decision?
            This action cannot be undone, and will be effective immediately after agreeing
        </p>
        <form action="/en/delete-account" method="POST" class="main__modal__actions">
            <button type="button" id="closeModal">No, preserve account</button>
            @csrf
            <button type="submit">Yes, delete</button>
        </form>
    </div>
@endsection

@include('layouts.common-en')