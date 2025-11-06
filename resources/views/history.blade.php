@extends('layouts.app')

@section('css-js')
<link rel="stylesheet" href="{{ asset('css/history.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('js/timeline.js') }}"></script>
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
                <img src="{{ asset('img/timeline-corner.png') }}" class="timeline-start">
            </div>
            <div class="swiper-slide">
                <p class="time">s.XVIII</p>
                <img src="{{ asset('img/timeline.png') }}">
            </div>
            <div class="swiper-slide">
                <p class="time">1857</p>
                <img src="{{ asset('img/timeline.png') }}">
            </div>
            <div class="swiper-slide">
                <p class="time">s.XIX</p>
                <img src="{{ asset('img/timeline.png') }}">
            </div>
            <div class="swiper-slide">
                <p class="time">s.XX</p>
                <img src="{{ asset('img/timeline-corner.png') }}" class="timeline-end">
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
                    (6), "...the book and the written monograph [...] are truly dead works.[...]
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
@endsection
@include('layouts.common')