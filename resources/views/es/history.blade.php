@extends('layouts.app')

@section('css-js')
<link rel="stylesheet" href="{{ asset('css/history.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('js/timeline.js') }}"></script>
<script src="{{ asset('js/dropdown.js') }}"></script>
@endsection

@section('faculty-color')
sciences
@endsection

@section('nav')
<a href="/es/about-directors">Sobre los directores</a>
<hr class="separator">
<a href="/es/methodology">Metodología</a>
<hr class="separator">
<a>Algo de historia</a>
<hr class="separator">
<a href="/es/list?page=1">Listado</a>
@endsection

@section('content')
    <h2>Historia</h2>
    <div class="main__cards">
        <div class="main__cards__text-card">
            <p>
                Esta pequeña reseña histórica pretende dar un vistazo muy resumido de lo que ha sido la historia del doctorado en España, 
                y simultáneamente la evolución de las Universidades y de la Física en los últimos siglos.
            </p>
        </div>
        <div class="main__cards__image-card"></div>
        <div class="main__cards__image-card order-physicists"></div>
        <div class="main__cards__text-card order-works">
            <p>
                Hay trabajos muy buenos en los que se puede obtener una mejor visión, 
                y algunos de los que yo he consultado aparecen referenciados al final de esta página. 
                Me remito a ellos para quien esta reseña le haya despertado la curiosidad.
            </p>
        </div>
        <div class="main__cards--background"></div>
    </div>
    <h3>La Investigación en Física en España</h3>
    <p class="research-main-text">
        Todos los que nos gusta la Física nos hemos preguntado alguna vez por qué España no ha producido grandes hombres que hayan contribuido en su historia. 
        El hecho es que grandes hombres los han habido, pero por múltiples causas no existía el caldo de cultivo necesario que los hiciera actuar como catalizadores.
    </p>
    <div class="swiper swiper--timeline-images">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{ asset('img/1559.jpg') }}" alt="Carlos tercero, rey de España" class="time-image">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('img/sXVIII.jpg') }}" alt="La pintura de Goya 'El 3 de Mayo en Madrid'" class="time-image">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('img/1857.jpg') }}" alt="Claudio Moyano, promotor de la ley Moyano" class="time-image">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('img/sXIX.jpg') }}" alt="Antonio Cánovas del Castillo, historiador y político del siglo 20" class="time-image">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('img/sXX.jpg') }}" alt="Santiago Ramón y Cajal, científico español" class="time-image">
            </div>
        </div>
    </div>
    <div class="swiper swiper--timeline-header">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <p class="time">1559</p>
                <div class="timeline-start"></div>
            </div>
            <div class="swiper-slide">
                <p class="time">s.XVIII</p>
                <div></div>
            </div>
            <div class="swiper-slide">
                <p class="time">1857</p>
                <div></div>
            </div>
            <div class="swiper-slide">
                <p class="time">s.XIX</p>
                <div></div>
            </div>
            <div class="swiper-slide">
                <p class="time">s.XX</p>
                <div class="timeline-end"></div>
            </div>
        </div>
        <div class="swiper__buttons">
            <img src="{{ asset('img/arrow.svg') }}" alt="botón anterior" class="swiper__buttons--prev" id="prev">
            <img src="{{ asset('img/arrow.svg') }}" alt="botón siguiente" class="swiper__buttons--next" id="next">
        </div>
    </div>
    <div class="swiper swiper--timeline-content">
        <div class="swiper-wrapper">
            <div class="swiper-slide timeline-text">
                <p>
                    El primer escollo que tuvo la ciencia en España puede ser probablemente la Pragmática de Felipe II del 22 de noviembre de 1559 
                    <a href="https://www.boe.es/biblioteca_juridica/publicacion.php?id=PUB-LH-1993-63">(Novíssima Recopilación, Libro VIII, Titulo IV, Ley 1)</a>. 
                    En ella prohibía bajo pena de destierro el que los estudiantes y profesores españoles salieran al extranjero porque 
                    "como quiera que en estos nuestros Reinos hay insignes Universidades [...] en las cuales hay personas muy doctas y suficientes en todas las ciencias" 
                    no veía necesidad de esa salida al exterior. Hay que tener en cuenta que es la época de la Reforma, 
                    y España no fué el único pais que se cerró a ideas foráneas. No obstante, 
                    sí que aquí se llevó a cabo con especial rigor perdurando esta pragmática en vigor hasta casi finales del siglo XVII. De hecho, 
                    hay que esperar hasta la llegada de los Borbones para que comience una apertura hacia Europa.
                </p>
                <p>
                    Esto indujo una fuerte inercia en el profesorado universitario que no podía desplazarse a otros paises a aprender las nuevas teorías, 
                    sino que se debía contentar con estudiar traducciones que, en muchos casos, llegaban con décadas de retraso. Como bien dijo Blas Cabrera 
                    <a href="#bibliography-6">(6)</a>, "...el libro y aún la monografía escrita [...] son realmente obras muertas.[...] 
                    Sólo el comercio directo con el maestro es modo seguro para educar al investigador..". 
                    La Ciencia en España se redujo en gran medida al estudio de textos sobre las teorías extranjeras, 
                    pero sin intentar reproducir los experimentos y sin aportar ideas nuevas.
                </p>
            </div>
            <div class="swiper-slide timeline-text">
                <p>
                    En la época del rey Carlos III se vivió un resurgimiento de la Ciencia en España, 
                    pero fué rápidamente cortada por la guerra de Independencia y las invasiones napoleónicas que echaron por tierra muchas de las incipientes instituciones 
                    de promoción de la Ciencia. Durante el siglo XIX hubo una tremenda agitación en las Universidades con una rápida sucesión de 
                    marcos legales, en muchos casos contradictorios (mayor incluso que la variabilidad de leyes actuales) 
                    que impidieron la recuperación al nivel de finales del Antiguo Régimen.
                </p>
            </div>
            <div class="swiper-slide timeline-text">
                <p>
                    Con la Ley Moyano del año 1857 aparece la facultad de Ciencias escindiéndose de la de Filosofía, conviertiéndose esta en Filosofía y Letras. 
                    Esta es la primera vez en que aparecen estudios de Física, al existir tres secciones: Físico-Matemática, Química y Naturales. 
                    Habrá que esperar hasta el año 1900 para que se constituya la sección de Físicas.
                </p>
            </div>
            <div class="swiper-slide timeline-text">
                <p>
                    A lo largo del siglo XIX, no obstante, la investigación en Física en las Universidades españolas es anecdótica y 
                    fruto más bien del entusiasmo de algunas personas aisladas. Realmente no hay medios ni voluntad formadora para poder realizar ni siquiera 
                    experimentos réplica de los que se llevan a cabo en Europa. El tren de la investigación no obstante empieza a marchar en estos años, 
                    y se emipezan a levantar voces denunciando el retraso de España en estas áreas (como en muchas otras). 
                    Hay que tener en cuenta que el índice de analfabetismo en España en 1900 se aproxima al 70%.
                </p>
            </div>
            <div class="swiper-slide timeline-text">
                <p>
                    Es la época en la que surgen D. José Echegaray, D. Santiago Ramón y Cajal, D. Leonardo Torres Quevedo y otros que 
                    llamaron la atención sobre el retraso y el complejo de inferioridad asumido por parte del profesorado universitario español 
                    frente a sus homólogos europeos. Por ejemplo, D.José Echegaray llamó la atención sobre estos hechos levantando una gran polémica 
                    en el Madrid de la época por el tono agresivo empleado.
                </p>
                <p>
                    Otro factor que no he comentado pero que obviamente servía de freno al desarrollo de las ciencias era la carencia 
                    de industria que demandara los servicios de un mundo académico a la altura de la Europa del XIX.
                </p>
            </div>
        </div>
    </div>
    <h3>Breve historia del doctorado</h3>
    <p>
        Hoy en día damos por hecho que el acceso al título de doctor lleva asociado el haber realizado una investigación original. 
        Pues bien, eso no ha sido así en España hasta bien entrado el siglo XX. Esta falta de originalidad, que puede chocar a más de uno, 
        es un punto menor si se compara con otros hechos. En los sucesivos reglamentos del siglo XIX se prohibía una y otra vez el servir 
        "refrescos ni obsequios de ninguna clase" (reglamento de 1852 de la Universidad Central). 
        Y de hecho en el Antiguo Régimen se llegaron a incluir en el acto de investidura de doctores procesiones e incluso corridas de toros. 
        Todo ello hacía que sólo las clases más pudientes pudieran acceder al doctorado y que la investidura fuera un acto más social que académico.
    </p>
    <section class="main__thesis-history">
        <img src="{{ asset('img/arch.svg') }}" class="main__thesis-history__arch">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="main__thesis-history__year">
            <defs>
                <path id="textPath1847" d="M20 70 Q250 10 280 70" />
            </defs>
            <text fill="white">
                <textPath startOffset="50%" xlink:href="#textPath1847">1847</textPath>
            </text>
        </svg>
        <div class="main__thesis-history__text">
            <p>
                Es en el año 1847 cuando aparece por vez primera la figura de la tesis. En el reglamento de ese año, 
                en el artículo 339 especifica que el candidato "escribirá una tesis sobre un punto cualquiera de la facultad o ciencia", 
                por lo que no ha de ser ni investigación al uso actual, ni tan siquiera tiene que ser original. Tampoco había una calificación. 
                Aun a pesar de la existencia de la tesis, es de reseñar que este acto seguía siendo más social que académico. Por ejemplo, 
                podía ocurrir que si dos hermanos querían obtener el titulo de doctor, bastaba con que uno leyera su tesis, y los dos obtenían el grado.
                En 1859 se califica por primera vez la tesis, pero su temática está limitada a una lista de unos 40 temas seleccionado cada año por la facultad.
            </p>
        </div>
    </section>
    <section class="main__thesis-history">
        <img src="{{ asset('img/arch.svg') }}" class="main__thesis-history__arch">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="main__thesis-history__year">
            <defs>
                <path id="textPath1880s" d="M-25 80 Q250 10 300 67" />
            </defs>
            <text fill="white">
                <textPath startOffset="50%" xlink:href="#textPath1880s">1880s</textPath>
            </text>
        </svg>
        <div class="main__thesis-history__text">
            <p>
                Entre los años 1883 y 1886 se reforma el doctorado de las diferentes facultades, quedando establecido que el doctorando elegirá libremente 
                el tema "sobre un tema doctrinal o de investigación práctica". Esta es la primera vez que aparece explícitamente la posibilidad de una tesis original. 
                En la reforma de 1900 aparece explicitado que los Decanos "deberán porporcionar los aparatos y recursos que fuere posible para hacer los trabajos de investigación referentes a su tesis doctoral", 
                pero, eso sí, "debiendo abonar los desperfectos que ocasionen y los gastos del material que emplearen".
            </p>
            <p>
                Es en ese momento, cuando la tesis contiene investigación original, cuando toma forma la figura del director. Aparece en 1918, 
                en que se estableció que "las tesis doctorales de la Facultad de Ciencias serán presentadas y apadrinadas por un catedrático [...] 
                con derecho a formar parte del tribunal".
            </p>
        </div>
    </section>
    <section class="main__thesis-history">
        <img src="{{ asset('img/arch.svg') }}" class="main__thesis-history__arch">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="main__thesis-history__year">
            <defs>
                <path id="textPathSXX" d="M20 75 Q250 10 280 64" />
            </defs>
            <text fill="white">
                <textPath startOffset="50%" xlink:href="#textPathSXX">s.XX</textPath>
            </text>
        </svg>
        <div class="main__thesis-history__text">
            <p>
                Con la constitución en 1907 de la Junta para la Ampliación de Estudios se dió el espaldarazo para lanzar la investigación en España. 
                Muchos de los laboratorios que entonces se formaron vieron abruptamente cortada su evolución con la llegada de la Guerra Civil. 
                Gran cantidad de científicos, especialmente en Física, como Blas Cabrera o Arturo Duperier, se vieron obligados a exiliarse.
            </p>
            <p>
                Hay que esperar hasta los años 50 para que la Física en España vuelva a resurgir, en gran parte gracias a españoles que 
                se han formado en el extranjero, y a la labor de algunos como Julio Palacios que la relanzaron en la posguerra. 
                Algunos de los exiliados retornaron, como Arturo Duperier, pero sin poder llegar a desarrollar su propia escuela.
            </p>
        </div>
    </section>
    <h5 id="show-bibliography">
        Bibliografía
        <img src="{{ asset('img/dropdown.png') }}" alt="desplegable">
    </h5>
    <ol class="main__bibliography" id="bibliography">
        <li id="bibliography-1">
            La Universidad Central y su distrito: Fondos documentales en el Archivo Histórico Nacional. María Carmona de los Santos, Boletín ANABAD, XLVI (1996) num.1
        </li>
        <li id="bibliography-2">
            El doctorado español en matemáticas entre 1900 y 1921. JJ Escribano Benito, L Español Gonzalez y M.A. Martinez García, ILUIL, vol. 29, 2006, pp 37-50 ISSN 0210-8615
        </li>
        <li id="bibliography-3">
            Los estudios de doctorado y el inicio de la tesis doctoral en España. 1847-1900. Aurora Miguel Alonso
        </li>
        <li id="bibliography-4">
            Las Ciencias Físico-matemáticas en la España del siglo XIX, José Manuel Sánchez-Ron, AYER, 7 (1992) pp. 51-84
        </li>
        <li id="bibliography-5">
            Ciencia y Técnica en España de 1898 a 1945: Cabrera, Cajal, Torres Quevedo. Actas del IV simposio. Amigos de la Cultura Científica (2004) ISBN 84-87635-35-0
        </li>
        <li id="bibliography-6">
            En el cententario de Blas Cabrera, Universidad Internacional de Canaria Perez-Galdós, 1979. ISBN 84-600-1442-8
        </li>
        <li id="bibliography-7">
            Historia de la Universidad Española, Alberto Jimenez Fraud, 1971, Alianza Editorial.
        </li>
    </ol>
@endsection
@include('layouts.common-es')