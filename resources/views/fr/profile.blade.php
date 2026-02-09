@extends('layouts.app')

@section('css-js')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<script src="{{ asset('js/show-password.js') }}"></script>
<script src="{{ asset('js/toggleModalDelete.js') }}"></script>
@endsection

@section('faculty-color')
sciences
@endsection

@section('nav')
<a href="/fr/about-directors">À propos des directeurs</a>
<hr class="separator">
<a href="/fr/methodology">Méthodologie</a>
<hr class="separator">
<a href="/fr/history">Bref historique</a>
<hr class="separator">
<a href="/fr/list?page=1">Liste</a>
@endsection

@section('content')

    @if(isset($error))
        <script>
            let errors = Object.values(@json($error->errors())).flat();
            let errorMessage = "";
            if(errors.findIndex(error => error.includes("require")) !== -1) {
                errorMessage = "Veuillez remplir les deux champs si vous souhaitez modifier votre mot de passe";
            }
            else if(errors.findIndex(error => error.includes("character")) !== -1)  {
                errorMessage = "Le mot de passe doit comporter au moins 8 caractères";
            }
            else if(errors.findIndex(error => error.includes("PasswordError")) !== -1)  {
                errorMessage = "Les mots de passe doivent correspondre";
            }
            else {
                errorMessage = "Une erreur s'est produite. Veuillez réessayer";
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
                text: "Le mot de passe a été mis à jour",
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
                <a href="/fr/create-account"><button>Créer un nouveau<br>compte utilisateur</button></a>
                <a href="/fr/logout"><img src="{{ asset('img/logout.svg') }}" alt="Icône de déconnexion"></a>
            </div>
        @else
            <a href="/fr/logout"><img src="{{ asset('img/logout.svg') }}" alt="Icône de déconnexion"></a>
        @endif
        <form autocomplete="off" action="/fr/change-password" method="POST" class="main__content__info">
            @csrf
            @method('PUT')
            <input type="text" name="name" id="name" value="{{ $user->name }} &nbsp;—&nbsp; {{ $user->email }}" disabled>
            <hr>
            <input value="{{ isset($passwords[0]) ? $passwords[0] : '' }}" type="password" name="password" id="password" placeholder="Nouveau mot de passe">
            <input value="{{ isset($passwords[1]) ? $passwords[1] : '' }}" type="password" name="confirm-password" id="confirm-password" placeholder="Confirmer le nouveau mot de passe">
            <button type="submit" class="main__content__info--change">Modifier le mot de passe</button>
            <button class="main__content__info--delete" type="button" id="modalDeleteButton">Supprimer le compte</button>
            <button class="main__content__info--show" type="button" id="show">
                <img src="{{ asset('/img/closedeye.svg') }}" alt="Afficher le mot de passe" id="closed">
                <img src="{{ asset('/img/openeye.svg') }}" alt="Masquer le mot de passe" id="open" class="hidden">
            </button>
        </form>
    </div>
    <div class="main__modal" id="modalDelete">
        <h2>Supprimer le compte</h2>
        <hr>
        <p>
            Vous êtes sur le point de supprimer <b>définitivement</b> votre compte. Êtes-vous sûr de votre décision?
            Cette action est irréversible et prendra effet immédiatement après validation
        </p>
        <form autocomplete="off" action="/fr/delete-account" method="POST" class="main__modal__actions">
            <button type="button" id="closeModal">Non, conserver le compte</button>
            @csrf
            <button type="submit">Oui, supprimer</button>
        </form>
    </div>
@endsection

@include('layouts.common-fr')