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
<a href="/about-directors">About the directors</a>
<a href="/methodology">Methodology</a>
<a>A bit of history</a>
<a href="/list">List of doctors</a>
@endsection

@section('content')
    <h2>History</h2>
    <div class="main__cards">
        <div class="main__cards__text-card">
            <p>
                This brief historic review aims to provide a summarized view of what has been the doctorate history in Spain,
                and simultaneously the evolution of Universities and Physics over the last centuries.
            </p>
        </div>
        <div class="main__cards__image-card">
            <img src="{{ asset('img/historicaldoctorate.jpg') }}" alt="A painting of how was the doctorate around the 1800-1900">
        </div>
        <div class="main__cards__text-card">
            <p>
                There are really good works that offer a better perspective,
                and some which I have consulted are referenced at the end of the page.
                I refer them to whoever this review has sparked their curiosity.
            </p>
        </div>
        <div class="main__cards__image-card">
            <img src="{{ asset('img/physicists.png') }}" alt="An image of the 1930 Solvay conference" class="center-physicists">
        </div>
        <div class="main__cards--background"></div>
    </div>
    <h3>The Research on Physics in Spain</h3>
    <p class="research-main-text">
        Those of us who likes Physics have wondered at some time why there's no great people that has contributed in Spain's history.
        The fact is that there has been great people, but for multiple reasons there wasn't enough enough breeding ground to make them act as catalysts.
    </p>
    <div class="swiper swiper--timeline-images">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{ asset('img/1559.jpg') }}" alt="Carlos the third, king of Spain" class="time-image">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('img/sXVIII.jpg') }}" alt="Goya's painting 'El 3 de Mayo en Madrid'" class="time-image">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('img/1857.jpg') }}" alt="Claudio Moyano, promoter of the Moyano Law" class="time-image">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('img/sXIX.jpg') }}" alt="Antonio cánovas del Castillo, historian and politician of the 20th Century" class="time-image">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('img/sXX.jpg') }}" alt="Santiago Ramón y Cajal, spanish scientist" class="time-image">
            </div>
        </div>
    </div>
    <div class="swiper swiper--timeline-header">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <p class="time">1559</p>
                <img src="{{ asset('img/timeline-corner.svg') }}" class="timeline-start">
            </div>
            <div class="swiper-slide">
                <p class="time">s.XVIII</p>
                <img src="{{ asset('img/timeline.svg') }}">
            </div>
            <div class="swiper-slide">
                <p class="time">1857</p>
                <img src="{{ asset('img/timeline.svg') }}">
            </div>
            <div class="swiper-slide">
                <p class="time">s.XIX</p>
                <img src="{{ asset('img/timeline.svg') }}">
            </div>
            <div class="swiper-slide">
                <p class="time">s.XX</p>
                <img src="{{ asset('img/timeline-corner.svg') }}" class="timeline-end">
            </div>
        </div>
        <div class="swiper__buttons">
            <img src="{{ asset('img/arrow.svg') }}" alt="previous button" class="swiper__buttons--prev" id="prev">
            <img src="{{ asset('img/arrow.svg') }}" alt="next button" class="swiper__buttons--next" id="next">
        </div>
    </div>
    <div class="swiper swiper--timeline-content">
        <div class="swiper-wrapper">
            <div class="swiper-slide timeline-text">
                <p>
                    The first hurdle that had the science in Spain it's probably Felipe II's Pragmatic Sanction of november 22, 1559
                    <a href="https://www.boe.es/biblioteca_juridica/publicacion.php?id=PUB-LH-1993-63">(Novíssima Recopilación, Libro VIII, Tiulo IV, Ley 1)</a>. 
                    It prohibited, under sentence of exilement, to spanish students and professors to exit to foreign countries because
                    "Since in these our Kingdoms there are distinguished Universities [...] in which there are very learned and capable persons in all the sciences"
                    he didn't see any necesity on getting out the country. We have to take into account that it was the times of the Reformation,
                    and Spain wasn't the only country that closed to foreign ideas. However,
                    it's true that here took place with special rigor, having this pragmatic in vigor until almost the end of the XVII century. In fact,
                    it had to wait until the arrival of the Borbons to begin an opening towards Europe.
                </p>
                <p>
                    This led a strong inertia in the university faculty that couldn't move to other countries to learn the newest theories,
                    but instead had to be content with studying translations that, in many cases, arrived decades late. As Blas Cabrerar very well said
                    <a href="#bibliography-6">(6)</a>, "...the book and the written monograph [...] are truly dead works.[...]
                    Only direct trade with the master is a safe method to educate the researcher...".
                    The Science in Spain was reducted in great measure to text study about foreign theories,
                    but without trying to recreate the experiments and without contributing new ideas.
                </p>
            </div>
            <div class="swiper-slide timeline-text">
                <p>
                    In the times of king Carlos III took place a resurge in the Science of Spain,
                    but it was shortly cut by the war for Independence and the napoleonic invasions that destroyed many of the incipient institutions
                    of Science promotion. During the XIX century there was a tremendous agitation in Universities with a fast succession of 
                    legal frameworks, in many cases conflicting (even bigger than the variability of modern laws)
                    that impeded the recovery up to the end of the Old Regimen.
                </p>
            </div>
            <div class="swiper-slide timeline-text">
                <p>
                    With Moyano's Law of 1857 appear sthe Science faculty spliting from the Philosophy, which becam in Philosophy and Literature.
                    This is the first time where Physic studies appear, thanks to three sections: Physics-Mathematics, Chemistry and Natural Sciencies.
                    It wasn't until the year 1900 that the Physics section was founded.
                </p>
            </div>
            <div class="swiper-slide timeline-text">
                <p>
                    During the XIX century, however, the Physic researchs in spanish Universities is anecdotic and more the result of 
                    the enthusiasm of a few isolated people. Actually, there's really neither resources nor will to carry out replica experiments 
                    of those that took place in Europe. The research train however began to run in this years,
                    and began to rise voices reporting the delay in Spain on this fields (as in many others).
                    We have to take into account that the rate of illiteracy in Spain in 1900 it was close to 70%.
                </p>
            </div>
            <div class="swiper-slide timeline-text">
                <p>
                    This is the time where Mr. José Echegaray, Mr. Santiago Ramón y Cajal, Mr. Leonardo Torres Quevedo and others arised and
                    draw the attention over the delay and the inferiority complex assumed by the faculties of spanish universities
                    before their european equivalent. For example, Mr. José Echegaray draw the attention over this facts creating a big controversy
                    in the Madrid of the epoch by the agressive tone used.
                </p>
                <p>
                    Another factor that I have not commented but obviously served as an obstacle of development in sciences was the lack
                    of industry that demanded the services of an academic world at the level of the XIX century Europe.
                </p>
            </div>
        </div>
    </div>
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
                It's in the year 1847 when the thesis figure appears for the first time. In that year's regulations,
                in the article 339 specifies that the candidate "will write a thesis about any point of the faculty or science",
                therefore, it does not have to be research in the current sense, not even an original one. There wasn't even a grade.
                Even despite the existence of the thesis, it is worth noting that this act was more social than academic. E.g., 
                it could happen that if two brothers wanted to obtain the doctor degree, it was sufficient for one of them to read his thesis, and both would have obtained the degree.
                It was first in 1859 when the thesis was first graded, but it's theme is limited to a list of 40ish themes selected every year by the faculty.
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
                Between the years 1883 and 1886 the doctorate of the different faculties is reformed, establishing that the doctoral student will choose freely
                the theme "about a doctrinal theme or practical research". This is the first time that explicitly appears the possibility of an original thesis.
                In the 1900 reform appears explicitly that the Deans "must provide the equipment and resources possible to do the research duty regarding the doctoral thesis",
                but undoubtedly "having to pay for the damage they may cause and the expenses of the equipment they use".
            </p>
            <p>
                It's in this moment, when the thesis contains original research, when the director's figure forms. Appears in 1918,
                when it was stablished that "the doctoral theses of the Sciences Faculty will be represented and supported by a professor [...]
                with right to be part of the magistrates court".
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
                With the 1907 constitution of the Council for the Expansion of Studies it was given the endorsment to launch the research in Spain.
                Many of the laboratories that were then formed watch suddenly cutted their evolution with the arrival of the Civil War.
                A lot of scientists, specially in Physics, such as Blas Cabrera or Arturo Duperier, were forced into exile.
            </p>
            <p>
                It wasn't until the 1950s that the Physics in Spain made a comeback, mainly thanks to spaniards that 
                learned abroad, and the labor of some like Julio Palacios that enhanced it in the post-war period.
                Some of the exiled returned, like Arturo Duperier, but without being able to develop their own school.
            </p>
        </div>
    </section>
    <h5 id="show-bibliography">
        Bibliography
        <img src="{{ asset('img/dropdown.png') }}" alt="dropdown">
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
@include('layouts.common')