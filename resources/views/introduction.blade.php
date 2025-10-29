@extends('layouts.app')

@section('css-js')
    <link rel="stylesheet" href="css/introduction.css">
@endsection

@section('faculty-color')
sciences
@endsection

@section('nav')
    <a href="/about-directors">About the directors</a>
    <a href="/methodology">Methodology</a>
    <a href="/history">A bit of history</a>
    <a href="/list">List of doctors</a>
@endsection

@section('content')
    <div class="main__card">
        <p>
            Recive the book of science which is your duty to teach and advance,
            and let it be a symbol and reminder that, however great your intellect may be,
            you muts show respect and reverence to the teachings of your masters and predecesors
            <br>
            <span>&emsp;&emsp;(Excerpt from the ceremony for the conferral of honoris causa doctorates)</span>
        </p>
        <img src="/img/biretta.png" alt="An image of a biretta from the sciences faculty">
    </div>
    <div class="main__description">
        <p>
            This project began as a search of the scientific records of my thesis director, professor Carlos Pérez García.
            As founder of the Physics and Applied Mathematics, he has been the director of many of the actual professors,
            so this genealogy is shared by many of the members of this department and many of its old doctorates.
        </p>
        <div class="main__description__images">
            <img src="/img/JavierBurgueteMas.jpg" alt="Front picture of doctor Javier Burguete">
            <img src="/img/CarlosPerezGarcia.jpg" alt="Front picture of doctor Carlos Perez">
        </div>
        <p>
            From this seed we've been developing the ramifications that have been appearing, that links us with other spanish and european universities.
            As a consequence of the developed investigation in our department, the directors related here have worked in the branch of Condensed Matter Physics.
            However, this family tree is not restricted to this area. It's open to any doctor.
            <br><br>
            Any idea or suggestion is welcome, and can be sent to my address listed <a href="#suggest">below</a>
            <br><br>
            Be welcomed, and discover our genealogy!
            <br><br>
            &emsp;&emsp;Pamplona, September the 13, 2010
        </p>
    </div>
@endsection