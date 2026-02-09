@extends('layouts.app')

@section('css-js')
<link rel="stylesheet" href="{{ asset('css/aboutdirectors.css') }}">
@endsection

@section('faculty-color')
sciences
@endsection

@section('nav')
<a>À propos des directeurs</a>
<hr class="separator">
<a href="/fr/methodology">Méthodologie</a>
<hr class="separator">
<a href="/fr/history">Bref historique</a>
<hr class="separator">
<a href="/fr/list?page=1">Liste</a>
@endsection

@section('content')
    <div class="main__faculties main__faculties--top">
        <div class="main__faculties__faculty philosophy-literature-education"></div>
        <div class="main__faculties__faculty law"></div>
    </div>
    <h2>À propos des directeurs</h2>
    <p>
        L'objectif de cette base de données est de faire connaître la transmission des connaissances et l'influence d'une génération de scientifiques sur la suivante.
        En général, la figure du directeur de thèse est déterminante dans ce processus, mais il existe certains cas où d'autres personnes ont eu une influence 
        plus marquée, ou simplement où il n'y a pas de directeur.
    </p>
    <p>
        Dans cette analyse, apparaissent sous la figure de directeurs tant ceux qui l'ont réellement été que ceux qui ont fortement influencé la formation et le développement de certains chercheurs.
        Lorsque cela se produit, cela est précisé dans la mini-biographie.
    </p>
    <p>
        De plus, il est indiqué par un code couleur : si après le nom apparaît [ &#x1D4D3; ] en noir, il s'agit du directeur officiel, 
        si apparaît <span class="blue-m">[ &#x1D4DC; ]</span> en bleu, 
        cela indique que le directeur qui apparaît est en réalité un scientifique qui a eu une influence notable sur sa carrière.
    </p>
    <div class="main__faculties">
        <div class="main__faculties__faculty communication"></div>
        <div class="main__faculties__faculty sciences"></div>
    </div>
    <p>
        Prenons trois exemples:
    </p>
    <p>
        M José María Vidal Llenas : Les travaux de recherche qui ont servi de base à sa thèse ont été menées sous la direction d'Arturo Duperier.
        Avant de pouvoir soutenir la thèse, et en raison de la guerre civile, M. Arturo Duperier s'est exilé en Grande-Bretagne. C'est pourquoi
        M. Isidro Polit Buxareu apparaît comme directeur officiel de la thèse. Les deux scientifiques apparaissent ici comme directeurs de M. José María Vidal Llenas.
    </p>
    <p>
        D. Léon Rosenfeld : Il a rédigé une thèse sous la direction de Marcel Dehalu en 1926 à l'Université de Liège. Cependant, 
        il a très vite commencé à collaborer avec Niels Bohr, dont il est devenu le principal disciple <a href="#biography-1"><sup>[1]</sup></a>. 
        C'est pourquoi les deux scientifiques apparaissent comme directeurs.
    </p>
    <p>
        M Blas Cabrera y Felipe : Ce cas est le plus particulier. Il soutint sa thèse en 1901, à l'Université Centrale de Madrid.
        À cette époque, la recherche en physique, en tant que telle, n'existait pas en Espagne, mais les thèses étaient essentiellement de brefs écrits sur une étude particulière.
        C'est à partir de 1900 que les laboratoires de recherche ont commencé à voir le jour. Les directeurs mentionnés sont deux personnes qui ont fortement influencé le parcours universitaire de M Blas Cabrera.
    </p>
    <div class="main__faculties">
        <div class="main__faculties__faculty medicine"></div>
        <div class="main__faculties__faculty engineering-and-arquitecture"></div>
    </div>
    <p>
        Le premier est Santiago Ramón y Cajal qui, comme le mentionne Cabrera lui-même dans son discours d'intronisation au fauteuil I de l'Académie Royale de la Langue Espagnole
        « je lui dois tout ce que je suis et tout ce que je pourrai être à l'avenir, car son encouragement et son aide ont orienté mon intelligence vers la voie de la recherche scientifique » <a href="#biography-2"><sup>[2]</sup></a>.
    </p>
    <p>
        Le second est Pierre-Ernest Weiss, qui a le plus influencé Blas Cabrera pour orienter ses futures recherches vers le magnétisme. 
        C'est lors de sa visite en 1912 qu'ils ont noué des relations, et comme le disait D. Blas Cabrera : « ...le livre et même la monographie écrite [...] sont véritablement des œuvres mortes. 
        [...] Seule l’interaction directe avec le maître est un moyen sûr de former le chercheur... ».
    </p>
    <div class="main__faculties">
        <div class="main__faculties__faculty economy"></div>
        <div class="main__faculties__faculty nursing"></div>
    </div>
    <p id="biography-1">
        [1] Voir la mini-biographie dans l'article consacré à Leon Rosenfeld.
    </p>
    <p id="biography-2">
        [2] En el centenario de Blas Cabrera, Universidad Internacional de Canaria Perez-Galdós, 1979. ISBN 84-600-1442-8
    </p>
    <div class="main__faculties main__faculties--bottom">
        <div class="main__faculties__faculty canon"></div>
        <div class="main__faculties__faculty pharmacy-nutrition"></div>
    </div>
@endsection
@include('layouts.common-fr')