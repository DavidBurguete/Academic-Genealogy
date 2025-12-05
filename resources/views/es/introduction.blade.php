@extends('layouts.app')

@section('css-js')
    <link rel="stylesheet" href="{{ asset('css/introduction.css') }}">
@endsection

@section('faculty-color')
sciences
@endsection

@section('nav')
    <a href="/es/about-directors">Sobre los directores</a>
    <hr class="separator">
    <a href="/es/methodology">Metodología</a>
    <hr class="separator">
    <a href="/es/history">Algo de historia</a>
    <hr class="separator">
    <a href="/es/list?page=1">Listado</a>
@endsection

@section('content')
    @if(request()->session()->exists("accountDeleted"))
        <script>
            Toastify({
                text: "La cuenta ha sido borrada con éxito",
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
            Recibe el libro de la ciencia que te cumple enseñar y adelantar, 
            y que él sea para ti significación y aviso de que, por grande que tu ingenio fuere, 
            debes rendir acatamiento y veneración a la doctrina de tus maestros y predecesores
            <br>
            <span>&emsp;&emsp;(Extracto de la ceremonia de investidura de doctores honoris causa)</span>
        </p>
        <img src="{{ asset('img/biretta.png') }}" alt="Imagen de un birrete de la facultad de ciencias">
    </div>
    <div class="main__description">
        <p>
            Este proyecto comenzó como una búsqueda de los antecedentes científicos de mi director de tesis, el profesor <b>Carlos Pérez García</b>.
            Como fundador del departamento de Física y Matemática Aplicada ha sido el director de muchos de los actuales profesores, 
            por los que esta genealogía es compartida por muchos de los integrantes de este departamento y muchos de sus antiguos doctorandos.
        </p>
        <div class="main__description__images">
            <img src="{{ asset('img/JavierBurgueteMas.jpg') }}" alt="Front picture of doctor Javier Burguete">
            <img src="{{ asset('img/CarlosPerezGarcia.jpg') }}" alt="Front picture of doctor Carlos Perez">
        </div>
        <p>
            Desde ese germen hemos ido desarrollando las ramificaciones que han ido apareciendo, que nos relaciona con otras Universidades españolas y europeas. 
            Como consecuencia de la investigación desarrollada en nuestro departamento los directores aquí relacionados han trabajado en la rama de la Física de Materia Condensada. 
            No obstante, este árbol genealógico no se restringe a ese área, sino que está abierto a cualquier doctor.
        </p>
        <p>
            Cualquier idea o sugerencia será bien recibida, y puede ser enviada a mi dirección indicada en la <a href="#suggest">parte inferior</a>.
        </p>
        <p>
            ¡Bienvenido, y descubra nuestra genealogía!
        </p>
        <p>
            &emsp;&emsp;Pamplona, a 13 de septiembre de 2010
        </p>
    </div>
@endsection
@include('layouts.common-es')