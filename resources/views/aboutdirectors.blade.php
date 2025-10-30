@extends('layouts.app')

@section('css-js')
<link rel="stylesheet" href="css/aboutdirectors.css">
@endsection

@section('faculty-color')
sciences
@endsection

@section('nav')
<a>About the directors</a>
<a href="/methodology">Methodology</a>
<a href="/history">A bit of history</a>
<a href="/list">List of doctors</a>
@endsection

@section('content')
    <div class="main__faculties main__faculties--top">
        <div class="main__faculties__faculty philosophy-literature-education"></div>
        <div class="main__faculties__faculty law"></div>
    </div>
    <h2>About the directors</h2>
    <p>
        The purpose of this database is to showcase the transmision of knowledge and the influence of one generation of scientists into the next.
        In general, the director's figure is determining in this process, but there's some cases where other people influenced in a more meaningful way,
        or there's simply no director.
    </p>
    <p>
        In this analysis appear under the directors' figure both those who really where one and those who strongly influenced in the formation and development of some of the researchers.
        In the cases where this happens it's pointed out in the mini-biography.
    </p>
    <p>
        Also, it's indicated with a color code: if [ &#x1D4D3; ] appears black after the name, it's a formal director, if <span class="blue-m">[ &#x1D4DC; ]</span> appears blue,
        indicates that the "director" actually is a scientist that influenced significantly in their career.
    </p>
    <div class="main__faculties">
        <div class="main__faculties__faculty communication"></div>
        <div class="main__faculties__faculty sciences"></div>
    </div>
    <p>
        Let's quote three examples:

    </p>
    <p>
        Mr. José María Vidal Llenas: The research duty that served as a base for his thesis was developed under the direction of Arturo Duperier.
        Before being able to read the thesis, and as a consequence of the Civil War, Mr. Arturo Duperier exiled himself to Great Britain.
        Because of this, Mr. Isidro Polit Buxareu appears as formal director. Both scientists appear here as directors of Mr José María Vidal Llenas.
    </p>
    <p>
        Mr. León Rosenfeld: He made a thesis under the direction of Marcel Dehalu in 1926 in Lieja's University. However,
        he soon began collaborating with Niels Bohr, whom he became in his main disciple <a href="#biography-1">[1]</a>. Because of this, both scientists appear as directors.
    </p>
    <p>
        Mr. Blas Cabrera y Felipe: This case it's the most peculiar. He read the thesis in 1901, in Madrid's Central University.
        In that time it did not exist in Spain the physics research strictly speaking, but the thesis was essentially a brief document about a particular study.
        It was from 1900 when laboratories to research began appearing. The directors recorded are two people that strongly influenced in the academic life of Mr. Blas Cabrera.
    </p>
    <div class="main__faculties">
        <div class="main__faculties__faculty medicine"></div>
        <div class="main__faculties__faculty engineering-and-arquitecture"></div>
    </div>
    <p>
        The first one is Mr. Santiago Ramón y Cajal, who, as Cabrera himself cites in his incorporation speach to the I seat of the Real Academia de la Lengua Española,
        "to him I owe who I am or who I might become, for his encouragment and aid directed the activity of my intellect along the path of scientific research" <a href="#biography-2">[2]</a>.
    </p>
    <p>
        El segundo es Pierre-Ernest Weiss, que fué el que influyó más sobre Blas Cabrera para dirigir su investigación futura hacia el magnetismo. 
        Fué en su visita de 1912 cuando entablaron relación, y como decía D. Blas Cabrera: "...el libro y aún la monografía escrita [...] son realmente obras muertas.
        [...] Sólo el comercio directo con el maestro es modo seguro para educar al investigador...".
    </p>
    <div class="main__faculties">
        <div class="main__faculties__faculty economy"></div>
        <div class="main__faculties__faculty nursing"></div>
    </div>
    <p id="biography-1">
        [1] See the mini-biography in Leon Rosenfeld's entry.
    </p>
    <p id="biography-2">
        [2] En el centenario de Blas Cabrera, Universidad Internacional de Canarias Perez-Galdós, 1979. ISBN 84-600-1442-8
    </p>
    <div class="main__faculties main__faculties--bottom">
        <div class="main__faculties__faculty canon"></div>
        <div class="main__faculties__faculty pharmacy-nutrition"></div>
    </div>
@endsection