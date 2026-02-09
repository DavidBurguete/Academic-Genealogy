@extends('layouts.app')

@section('css-js')
    <link rel="stylesheet" href="{{ asset('css/introduction.css') }}">
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
    @if(request()->session()->exists("accountDeleted"))
        <script>
            Toastify({
                text: "La compte a été effacé avec succèss",
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
    <div class="main__card">
        <p>
            Recevez le livre de la science que vous êtes destiné à enseigner et à faire progresser, 
            et qu'il soit pour vous un signe et un rappel que, quelle que soit l'étendue de votre ingéniosité, 
            vous devez rendre hommage et vénération à la doctrine de vos maîtres et prédécesseurs.
            <br>
            <span>&nbsp;&nbsp;(Extrait de la cérémonie de remise des doctorats honoris causa)</span>
        </p>
        <img src="{{ asset('img/biretta.png') }}" alt="Image d'un bonnet doctoral de la Faculté des Sciences">
    </div>
    <div class="main__description">
        <p>
            Ce projet a débuté par une recherche sur le parcours scientifique de mon directeur de thèse, le professeur <b>Carlos Pérez García</b>. 
            En tant que fondateur du Département de Physique et de Mathématiques Appliquées, il a dirigé nombre des professeurs actuels, 
            ainsi, cette généalogie est partagée par de nombreux membres de ce département et par beaucoup de ses anciens doctorants.
        </p>
        <div class="main__description__images">
            <img src="{{ asset('img/JavierBurgueteMas.jpg') }}" alt="Photo recto du Dr Javier Burguete">
            <img src="{{ asset('img/CarlosPerezGarcia.jpg') }}" alt="Photo recto du Dr Carlos Perez">
        </div>
        <p>
            À partir de cette graine, nous avons développé les ramifications qui ont émergé, nous reliant à d'autres universités espagnoles et européennes. 
            À la suite des recherches menées au sein de notre département, les directeurs mentionnés ici ont travaillé dans le domaine de la Physique de la Matière Condensée. 
            Cependant, cet arbre généalogique ne se limite pas à ce domaine, mais est ouvert à tout docteur.
        </p>
        <p>
            Toute idée ou suggestion sera la bienvenue et peut être envoyée à mon adresse indiquée <a href="#suggest">ci-dessous</a>.
        </p>
        <p>
            Bienvenue, et découvrez notre généalogie!
        </p>
        <p>
            &nbsp;&nbsp;Pampelune, le 13 septembre 2010
        </p>
    </div>
@endsection
@include('layouts.common-fr')