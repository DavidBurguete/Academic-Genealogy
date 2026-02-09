@extends('layouts.account')
@section('website-name')
Généalogie<br>Académique
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
                    error = "Veuillez remplir les champs";
                    break;
                case "NameError": 
                    error = "L'utilisateur spécifié n'existe pas";
                    break;
                case "PasswordError": 
                    error = "Mot de passe incorrect";
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
    <h2>Accès</h2>
    <input name="name" id="name" type="text" placeholder="Nom complet" value="{{ isset($request->name) ? $request->name : '' }}">
    <input name="password" id="password" type="password" placeholder="Mot de passe" value="{{ isset($request->password) ? $request->password : '' }}">
    <div class="actions">
        <a href="{{ url()->previous() }}">
            <img src="{{ asset('/img/return.svg') }}" alt="Bouton retour">
        </a>
        <button type="submit">Se connecter</button>
    </div>
    <p>Êtes-vous docteur ou professeur et souhaitez-vous accéder à cet espace? <a href="/fr/request-access">Le demander ici</a></p>
@endsection

@section('languages')
    <a><img src="{{ asset('img/spanish.png') }}" alt="Espagnol"></a>
    <a href="/en/login"><img src="{{ asset('img/english.png') }}" alt="Anglais"></a>
    <a href="/fr/login"><img src="{{ asset('img/french.png') }}" alt="Français"></a>
@endsection