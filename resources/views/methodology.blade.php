@extends('layouts.app')

@section('css-js')
<link rel="stylesheet" href="{{ asset('css/methodology.css') }}">
@endsection

@section('faculty-color')
sciences
@endsection

@section('nav')
<a href="about-directors">About the directors</a>
<a>Methodology</a>
<a href="/history">A bit of history</a>
<a href="/list">List of doctors</a>
@endsection

@section('content')
    <div class="main__faculties main__faculties--top">
        <div class="main__faculties__faculty medicine"></div>
        <div class="main__faculties__faculty sciences"></div>
    </div>
    <h2>Methodology</h2>
    <p>
        First of all, I'd like to say that I'm no historian and I don't intend to be one.
        I'm just a physicist who in his free time has devoted some time to try rebuilding a bit of history.
        For that reason, first of all, my apologies to the professionals, because there are and very good in Spain.
    </p>
    <div class="main__faculties">
        <div class="main__faculties__faculty communication"></div>
        <div class="main__faculties__faculty law"></div>
    </div>
    <p>
        However, even if I'm an amateur I have tried to verify each of the facts included here and not just settle with a "fact" that could appear on a website.
        Whenever it's been possible, I tried to consult the original sources (theses or first hand testimonies) and when not,
        either written sources (necrologics of scientifics societies, biographies or homages) or databases (for modern theses, TESEO,
        for the very old of the Central University, the PARES database of the ministry and the National Historic Archive).
    </p>
    <div class="main__faculties">
        <div class="main__faculties__faculty philosophy-literature-education"></div>
        <div class="main__faculties__faculty pharmacy-nutrition"></div>
    </div>
    <p>
        The information contained in the section "Brief Biography" is referenced. If in any of those there's no source,
        please do let me know and I'll add it. The rest of the information comes from the previously cited sources, and should be "easy" to rebuild,
        except for the cases where the information has been transmited verbally or by email address.
    </p>
    <div class="main__faculties">
        <div class="main__faculties__faculty engineering-and-arquitecture"></div>
        <div class="main__faculties__faculty canon"></div>
    </div>
    <p>
        Obviously, I have to thank the collaboration of a lot of people that has provided me with information and anecdotes, many of them not included here,
        but have them stored and archived with affection. To all of them, thank you.
    </p>
    <p>
        I have to say that for me this labor, developed for the past year (and will probably never leave), has been tremendously awarding.
        At the same time, it made me realize how hard oter times where, and the greatness of those who preceded us.
    </p>
    <div class="main__faculties main__faculties--bottom">
        <div class="main__faculties__faculty economy"></div>
        <div class="main__faculties__faculty nursing"></div>
    </div>
@endsection
@include('layouts.common')