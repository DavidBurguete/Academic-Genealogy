@extends('layouts.app')

@section('css-js')
<link rel="stylesheet" href="{{ asset('css/aboutdirectors.css') }}">
@endsection

@section('faculty-color')
sciences
@endsection

@section('nav')
<a>Sobre los directores</a>
<hr class="separator">
<a href="/es/methodology">Metodología</a>
<hr class="separator">
<a href="/es/history">Algo de historia</a>
<hr class="separator">
<a href="/es/list?page=1">Listado</a>
@endsection

@section('content')
    <div class="main__faculties main__faculties--top">
        <div class="main__faculties__faculty philosophy-literature-education"></div>
        <div class="main__faculties__faculty law"></div>
    </div>
    <h2>Sobre los directores</h2>
    <p>
        El objetivo de esta base de datos es dar a conocer la transmisión del conocimiento y la influencia de una generación de científicos en la siguiente. 
        En general, la figura del director es determinante en este proceso, pero existen algunos casos en los que hay otras personas que influyeron 
        de manera más marcada, o simplemente no existe tal director.
    </p>
    <p>
        En este análisis aparecen bajo la figura de directores tanto los que relamente lo fueron como los que influyeron fuertemente en la formación y desarrollo de alguno de los investigadores. 
        En los casos en que esto ocurre está detallado en la Mini-Biografía.
    </p>
    <p>
        Además, está indicado con un código de colores: si después del nombre aparece [ &#x1D4D3; ] en negro, es el director formal, 
        si aparece <span class="blue-m">[ &#x1D4DC; ]</span> en azul, 
        indica que el director que aparece es en realidad un científico que influyó notablemente en su carrera.
    </p>
    <div class="main__faculties">
        <div class="main__faculties__faculty communication"></div>
        <div class="main__faculties__faculty sciences"></div>
    </div>
    <p>
        Citemos tres ejemplos:
    </p>
    <p>
        D. José María Vidal Llenas: La labor investigadora que sirvió de base para su tesis fué realizada bajo la dirección de Arturo Duperier. 
        Antes de poder leer la tesis, y como consecuencia de la Guerra Civil, D. Arturo Duperier se exilió a Gran Bretaña. Por esa razón, 
        figura como director formal de la tesis D. Isidro Polit Buxareu. Ambos científicos aparecen aquí como directores de D. José María Vidal Llenas.
    </p>
    <p>
        D. Léon Rosenfeld: Realizó una tesis bajo la dirección de Marcel Dehalu en 1926 en la universidad de Lieja. No obstante, 
        muy pronto empezó a colaborar con Niels Bohr del que se convirtió en el principal discípulo <a href="#biography-1"><sup>[1]</sup></a>. 
        Por ello aparecen ambos científicos como directores.
    </p>
    <p>
        D. Blas Cabrera y Felipe: Este caso es el más peculiar. Leyó la tesis en 1901, en la Universidad Central de Madrid. 
        En aquella época no existía en España la investigación en física propiamente dicha, sino que las tesis eran básicamente un escrito breve sobre un estudio particular. 
        Es a partir de 1900 cuando comenzarán a existir laboratorios donde investigar. Los directores consignados son dos personas que influyeron muy fuertemente en la vida académica de D. Blas Cabrera.
    </p>
    <div class="main__faculties">
        <div class="main__faculties__faculty medicine"></div>
        <div class="main__faculties__faculty engineering-and-arquitecture"></div>
    </div>
    <p>
        El primero es D. Santiago Ramón y Cajal, que, tal y como cita el propio Cabrera en su discurso de incorporación al sillón I de la Real Academia de la Lengua Española 
        "a él debo cuanto soy o pueda significar en el porvenir, pues su impulso y ayuda enderezó la actividad de mi inteligencia por la senda de la investigación científica" <a href="#biography-2"><sup>[2]</sup></a>.
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
        [1] Ver la Mini-Biografía en la entrada de Leon Rosenfeld.
    </p>
    <p id="biography-2">
        [2] En el centenario de Blas Cabrera, Universidad Internacional de Canaria Perez-Galdós, 1979. ISBN 84-600-1442-8
    </p>
    <div class="main__faculties main__faculties--bottom">
        <div class="main__faculties__faculty canon"></div>
        <div class="main__faculties__faculty pharmacy-nutrition"></div>
    </div>
@endsection
@include('layouts.common-es')