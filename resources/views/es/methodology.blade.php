@extends('layouts.app')

@section('css-js')
<link rel="stylesheet" href="{{ asset('css/methodology.css') }}">
@endsection

@section('faculty-color')
sciences
@endsection

@section('nav')
<a href="/es/about-directors">Sobre los directores</a>
<hr class="separator">
<a>Metodología</a>
<hr class="separator">
<a href="/es/history">Algo de historia</a>
<hr class="separator">
<a href="/es/list?page=1">Listado</a>
@endsection

@section('content')
    <div class="main__faculties main__faculties--top">
        <div class="main__faculties__faculty medicine"></div>
        <div class="main__faculties__faculty sciences"></div>
    </div>
    <h2>Metodología</h2>
    <p>
        Ante todo, quisiera decir que no soy historiador ni pretendo serlo. 
        Sólo soy un físico que en sus ratos libres ha dedicado un tiempo a intentar reconstruir una parte de su historia. 
        Por eso, lo primero, perdón a los profesionales, que los hay y muy buenos en España.
    </p>
    <div class="main__faculties">
        <div class="main__faculties__faculty communication"></div>
        <div class="main__faculties__faculty law"></div>
    </div>
    <p>
        No obstante, aunque sea un aficionado he intentado verificar cada uno de los datos aquí incluidos y no conformarme con un "dato" que pueda aparecer en una página web. 
        Cuando ha sido posible, he intentado consultar las fuentes originales (tesis o testimonios de primera mano) y cuando no, 
        bien fuentes escritas (necrológicas de Sociedades científicas, biografías u homenajes) o bases de datos (para las tesis modernas, TESEO, 
        para las muy antiguas de la Universidad Central, la base de datos PARES del ministerio y el Archivo Histórico Nacional).
    </p>
    <div class="main__faculties">
        <div class="main__faculties__faculty philosophy-literature-education"></div>
        <div class="main__faculties__faculty pharmacy-nutrition"></div>
    </div>
    <p>
        La información contenida en la sección "Breve Biografía" está referenciada. Si en alguna de ellas no aparece la fuente, 
        por favor háganmelo saber y la colocaré. El resto de información proviene de las fuentes arriba citadas, y debería ser "sencillo" de reconstruir, 
        excepto en los casos en que la información ha sido transmitida verbalmente o por correo electrónico.
    </p>
    <div class="main__faculties">
        <div class="main__faculties__faculty engineering-and-arquitecture"></div>
        <div class="main__faculties__faculty canon"></div>
    </div>
    <p>
        Obviamente, he de agradecer la colaboración de mucha gente que me ha aportado datos y anécdotas, muchas de ellas no recogidas aquí, 
        pero que he guardado y archivado con cariño. A todos ellos gracias.
    </p>
    <p>
        He de decir que para mí esta labor desarrollada desde hace un año (y que probablemente nunca dejaré) ha sido una labor tremendamente gratificante. 
        A la vez, me ha hecho darme cuenta de los duros que fueron otros tiempos, y de la grandeza de los que nos precedieron.
    </p>
    <div class="main__faculties main__faculties--bottom">
        <div class="main__faculties__faculty economy"></div>
        <div class="main__faculties__faculty nursing"></div>
    </div>
@endsection
@include('layouts.common-es')