@extends('layouts.app')

@section('css-js')
<link rel="stylesheet" href="{{ asset('css/createaccount.css') }}">
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
    @if(isset($errors) && count($errors) > 0)
        <script>
            let errors = Object.values(@json($errors->toArray())).flat();
            let errorMessage = "";
            if(errors.findIndex(error => error.includes("require")) !== -1) {
                errorMessage = "Pour créer un utilisateur, tous les champs sont obligatoires";
            }
            else if(errors.findIndex(error => error.includes("character")) !== -1)  {
                errorMessage = "Le nom d'utilisateur doit comporter au moins 5 caractères et le mot de passe au moins 8 caractères";
            }
            else if(errors.findIndex(error => error.includes("selected")) !== -1)  {
                errorMessage = "Le rôle sélectionné n'est pas valide";
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
                text: "Utilisateur créé avec succès!",
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
    <form autocomplete="off" action="/fr/account-created" method="POST">
        @csrf
        <h2>Créer un nouvel utilisateur</h2>
        <input type="text" name="name" id="name" placeholder="Nom d'utilisateur" value="{{ old('name') }}">
        <input type="email" name="email" id="email" placeholder="Courrier" value="{{ old('email') }}">
        <input type="text" name="password" id="password" placeholder="Mot de passe" value="{{ old('password') }}">
        <select name="role" id="role">
            <option value="base" {{ old('role') === 'base' ? 'selected' : '' }}>Base</option>
            <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Administrateur</option>
        </select>
        <button type="submit">Créer</button>
    </form>
@endsection
@include('layouts.common-fr')