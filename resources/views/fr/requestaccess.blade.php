@extends('layouts.account')
@section('website-name')
Généalogie<br>Académique
@endsection

@section('destination')
request-access
@endsection

@section('form')
    @if(sizeof($errors) >= 1)
        <script>
            Toastify({
                text: "S'il vous plait, veuillez remplir tous les champs",
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
    <h2>Demande d'accès</h2>
    <input name="name" id="name" value="{{ old('name') }}" type="text" placeholder="Nom complet">
    <input name="email" id="email" value="{{ old('email') }}" type="email" placeholder="Adresse e-mail">
    <div class="actions">
        <a href="{{ url()->previous() }}">
            <img src="{{ asset('/img/return.svg') }}" alt="Bouton retour">
        </a>
        <button type="submit">Demander l'autorisation</button>
    </div>
    <p>Vous avez déjà un compte? <a href="/fr/login">Se connecter</a></p>
@endsection

@section('languages')
    <a><img src="{{ asset('img/spanish.png') }}" alt="Espagnol"></a>
    <a href="/en/request-access"><img src="{{ asset('img/english.png') }}" alt="Anglais"></a>
    <a href="/fr/request-access"><img src="{{ asset('img/french.png') }}" alt="Français"></a>
@endsection