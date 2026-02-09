@extends('layouts.app')

@section('css-js')
<link rel="stylesheet" href="{{ asset('css/methodology.css') }}">
@endsection

@section('faculty-color')
sciences
@endsection

@section('nav')
<a href="/fr/about-directors">À propos des directeurs</a>
<hr class="separator">
<a>Méthodologie</a>
<hr class="separator">
<a href="/fr/history">Bref historique</a>
<hr class="separator">
<a href="/fr/list?page=1">Liste</a>
@endsection

@section('content')
    <div class="main__faculties main__faculties--top">
        <div class="main__faculties__faculty medicine"></div>
        <div class="main__faculties__faculty sciences"></div>
    </div>
    <h2>Méthodologie</h2>
    <p>
        Tout d'abord, je tiens à préciser que je ne suis pas historien et que je ne prétends pas l'être.
        Je ne suis qu'un physicien qui, pendant son temps libre, s'est consacré à tenter de reconstituer une partie de son histoire.
        C'est pourquoi je tiens tout d'abord à m'excuser auprès des professionnels, qui sont nombreux et très compétents en Espagne.
    </p>
    <div class="main__faculties">
        <div class="main__faculties__faculty communication"></div>
        <div class="main__faculties__faculty law"></div>
    </div>
    <p>
        Cependant, bien qu'amateur, j'ai essayé de vérifier chaque fait présenté ici et de ne pas me contenter d'une « information » trouvée sur un site web.
        Dans la mesure du possible, j'ai essayé de consulter les sources originales (thèses ou témoignages directs) et, lorsque cela n'était pas possible, 
        soit des sources écrites (nécrologies de sociétés scientifiques, biographies ou hommages), soit des bases de données (pour les thèses modernes, TESEO, 
        pour les très anciennes de l'Université Centrale, la base de données PARES du Ministère et les Archives Historiques Nationales).
    </p>
    <div class="main__faculties">
        <div class="main__faculties__faculty philosophy-literature-education"></div>
        <div class="main__faculties__faculty pharmacy-nutrition"></div>
    </div>
    <p>
        Les informations contenues dans la section « Brève biographie » sont référencées. Si l'une d'entre elles ne mentionne pas la source, 
        veuillez me le signaler afin que je l'ajoute. Le reste des informations provient des sources citées ci-dessus et devrait être « facile » à reconstituer, 
        sauf lorsqu'elles ont été transmises oralement ou par courrier électronique.
    </p>
    <div class="main__faculties">
        <div class="main__faculties__faculty engineering-and-arquitecture"></div>
        <div class="main__faculties__faculty canon"></div>
    </div>
    <p>
        Je tiens évidemment à remercier toutes les personnes qui m'ont fourni des informations et des anecdotes, dont beaucoup ne figurent pas ici, 
        mais que j'ai conservées et archivées avec soin. Merci à tous.
    </p>
    <p>
        Je dois dire que pour moi, ce travail, auquel je me consacre depuis un an, (et que je ne quitterai probablement jamais) a été extrêmement gratifiant.
        En même temps, il m'a fait prendre conscience de la dureté des temps passés et de la grandeur de ceux qui nous ont précédés.
    </p>
    <div class="main__faculties main__faculties--bottom">
        <div class="main__faculties__faculty economy"></div>
        <div class="main__faculties__faculty nursing"></div>
    </div>
@endsection
@include('layouts.common-fr')