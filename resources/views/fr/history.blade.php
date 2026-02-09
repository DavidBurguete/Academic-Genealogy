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
<a href="/fr/about-directors">À propos des directeurs</a>
<hr class="separator">
<a href="/fr/methodology">Méthodologie</a>
<hr class="separator">
<a>Bref historique</a>
<hr class="separator">
<a href="/fr/list?page=1">Liste</a>
@endsection

@section('content')
    <h2>Histoire</h2>
    <div class="main__cards">
        <div class="main__cards__text-card">
            <p>
                Ce petit aperçu historique vise à donner un résumé très succinct de l'histoire du doctorat en Espagne, 
                ainsi que de l'évolution des universités et de la physique au cours des derniers siècles.
            </p>
        </div>
        <div class="main__cards__image-card"></div>
        <div class="main__cards__image-card order-physicists"></div>
        <div class="main__cards__text-card order-works">
            <p>
                Il existe d'excellents ouvrages qui permettent d'avoir une perspective plus complète, 
                et certains de ceux que j'ai consultés sont référencés à la fin de cette page. 
                Je les recommande à ceux que cet aperçu aura intrigués.
            </p>
        </div>
        <div class="main__cards--background"></div>
    </div>
    <h3>La recherche en physique en Espagne</h3>
    <p class="research-main-text">
        Nous tous qui aimons la physique nous sommes un jour demandé pourquoi l'Espagne n'a pas produit de grands hommes ayant contribué à son histoire. 
        Le fait est qu'il y a eu de grands hommes, mais pour de nombreuses raisons, l'environnement nécessaire à leur rôle de catalyseurs n'existait pas.
    </p>
    <div class="swiper swiper--timeline-images">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{ asset('img/1559.jpg') }}" alt="Charles III, roi d'Espagne" class="time-image">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('img/sXVIII.jpg') }}" alt="Le tableau de Goya 'El 3 de Mayo en Madrid'" class="time-image">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('img/1857.jpg') }}" alt="Claudio Moyano, promoteur de la loi Moyano" class="time-image">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('img/sXIX.jpg') }}" alt="Antonio Cánovas del Castillo, historien et homme politique du XXe siècle" class="time-image">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('img/sXX.jpg') }}" alt="Santiago Ramón y Cajal, scientifique espagnol" class="time-image">
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
                <p class="time">XVIIIe</p>
                <div></div>
            </div>
            <div class="swiper-slide">
                <p class="time">1857</p>
                <div></div>
            </div>
            <div class="swiper-slide">
                <p class="time">XIXe</p>
                <div></div>
            </div>
            <div class="swiper-slide">
                <p class="time">XXe</p>
                <div class="timeline-end"></div>
            </div>
        </div>
        <div class="swiper__buttons">
            <img src="{{ asset('img/arrow.svg') }}" alt="Bouton précédent" class="swiper__buttons--prev" id="prev">
            <img src="{{ asset('img/arrow.svg') }}" alt="Bouton suivant" class="swiper__buttons--next" id="next">
        </div>
    </div>
    <div class="swiper swiper--timeline-content">
        <div class="swiper-wrapper">
            <div class="swiper-slide timeline-text">
                <p>
                    Le premier obstacle rencontré par la science en Espagne est probablement la Pragmatique de Philippe II du 22 novembre 1559 
                    <a href="https://www.boe.es/biblioteca_juridica/publicacion.php?id=PUB-LH-1993-63">(Novíssima Recopilación, Libro VIII, Titulo IV, Ley 1)</a>. 
                    Il y interdisait sous peine d'exil aux étudiants et professeurs espagnols de partir à l'étranger car 
                    « étant donné que nos royaumes comptent d'illustres universités [...] où enseignent des personnes très savantes et compétentes dans toutes les sciences », 
                    il ne voyait pas la nécessité de partir à l'étranger. Il faut tenir compte du fait que c'était l'époque de la Réforme, 
                    et que l'Espagne n'était pas le seul pays à se fermer aux idées étrangères. Cependant, 
                    cette politique fut appliquée ici avec une rigueur particulière et resta en vigueur jusqu'à la fin du XVIIe siècle. En fait, 
                    il fallut attendre l'arrivée des Bourbons pour que s'amorce une ouverture vers l'Europe.
                </p>
                <p>
                    Cela a induit une forte inertie chez les professeurs d'université qui ne pouvaient pas se rendre dans d'autres pays pour apprendre les nouvelles théories, 
                    mais devaient se contenter d'étudier des traductions qui, dans de nombreux cas, arrivaient avec des décennies de retard. Comme l'a bien dit Blas Cabrera
                    <a href="#bibliography-6">(6)</a>, « ...le livre et même la monographie écrite [...] sont en réalité des œuvres mortes.[...] 
                    Seul le échange direct avec le maître est le moyen le plus sûr d'éduquer le chercheur... ».
                    En Espagne, la science se limitait en grande partie à l'étude de textes sur des théories étrangères, 
                    sans tentative de reproduire les expériences ni d'apporter de nouvelles idées.
                </p>
            </div>
            <div class="swiper-slide timeline-text">
                <p>
                    À l'époque du roi Charles III, la science a connu un regain d'intérêt en Espagne, 
                    mais celui-ci a été rapidement interrompu par la guerre d'indépendance et les invasions napoléoniennes qui ont détruit bon nombre des institutions naissantes 
                    de promotion de la science. Au cours du XIXe siècle, les universités ont connu de profonds bouleversements, avec une succession rapide 
                    de cadres juridiques, souvent contradictoires (encore plus que la variabilité des lois actuelles) 
                    qui ont empêché le retour au niveau de la fin de l'Ancien Régime.
                </p>
            </div>
            <div class="swiper-slide timeline-text">
                <p>
                    Avec la loi Moyano de 1857, la faculté des Sciences se sépare de celle de Philosophie, qui devient la faculté de Philosophie et Lettres. 
                    C'est la première fois que des études de Physique apparaissent, avec trois sections: Physique-Mathématiques, Chimie et Sciences Naturelles.
                    Il faudra attendre l'année 1900 pour que la section de physique soit créée.
                </p>
            </div>
            <div class="swiper-slide timeline-text">
                <p>
                    Tout au long du XIXe siècle, cependant, la recherche en physique dans les universités espagnoles est anecdotique et 
                    résulte plutôt de l'enthousiasme de quelques personnes isolées. Il n'y a en réalité ni les moyens ni la volonté de former pour permettre même de 
                    reproduire les expériences menées en Europe. Le train de la recherche commence néanmoins à se mettre en marche au cours de ces années, 
                    et des voix s'élèvent pour dénoncer le retard de l'Espagne dans ces domaines (comme dans beaucoup d'autres). 
                    Il faut tenir compte du fait que le taux d'analphabétisme en Espagne en 1900 avoisine les 70 %.
                </p>
            </div>
            <div class="swiper-slide timeline-text">
                <p>
                    C'est à cette époque qu'apparaissent des personnalités comme José Echegaray, Santiago Ramón y Cajal, Leonardo Torres Quevedo et d'autres
                    qui attirent l'attention sur le retard et le complexe d'infériorité assumé par les professeurs d'université espagnols par 
                    rapport à leurs homologues européens. Par exemple, José Echegaray a attiré l'attention sur ces faits, suscitant une grande polémique 
                    dans le Madrid de l'époque en raison du ton agressif qu'il employait.
                </p>
                <p>
                    Un autre facteur que je n'ai pas mentionné, mais qui freinait manifestement le développement des sciences, était l'absence 
                    d'industrie susceptible de faire appel aux services d'un monde universitaire à la hauteur de l'Europe du XIXe siècle.
                </p>
            </div>
        </div>
    </div>
    <h3>Brève histoire du doctorat</h3>
    <p>
        Aujourd'hui, nous considérons comme acquis que l'accès au titre de docteur est associé à la réalisation d'une recherche originale. 
        Or, cela n'a pas été le cas en Espagne jusqu'au début du XXe siècle. Ce manque d'originalité, qui peut en choquer plus d'un, 
        est un détail mineur si on le compare à d'autres faits. Les règlements successifs du XIXe siècle interdisaient à plusieurs reprises de servir 
        « des rafraîchissements ou des cadeaux de quelque nature que ce soit » (règlement de 1852 de l'Université centrale). 
        Et en fait, sous l'Ancien Régime, des processions et même des corridas étaient incluses dans la cérémonie de remise des diplômes aux docteurs. 
        Tout cela faisait que seules les classes les plus aisées pouvaient accéder au doctorat et que la cérémonie était davantage un événement social qu'académique.
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
                C'est en 1847 que la thèse fait son apparition. Dans le règlement de cette année-là, 
                l'article 339 précise que le candidat « rédigera une thèse sur un sujet quelconque relevant de la faculté ou de la science », 
                ce qui signifie qu'il ne s'agit pas d'une recherche au sens actuel du terme, ni même d'un travail original. Il n'y avait pas non plus de notation. 
                Malgré l'existence de la thèse, il convient de souligner que cet acte restait plus social qu'académique. Par exemple, 
                il pouvait arriver que si deux frères souhaitaient obtenir le titre de docteur, il suffisait que l'un d'eux lise sa thèse pour que les deux obtiennent le diplôme. 
                En 1859, la thèse est notée pour la première fois, mais son sujet est limité à une liste d'environ 40 sujets sélectionnés chaque année par la faculté.
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
                Entre 1883 et 1886, le doctorat des différentes facultés est réformé, et il est établi que le doctorant choisira librement 
                le sujet « sur un thème doctrinal ou de recherche pratique ». C'est la première fois que la possibilité d'une thèse originale apparaît explicitement mentionnée. 
                La réforme de 1900 précise que les doyens « doivent fournir les équipements et les ressources nécessaires pour mener à bien les travaux de recherche liés à leur thèse de doctorat », 
                mais, bien entendu, « doivent prendre en charge les dommages éventuels et le coût du matériel utilisé ».
            </p>
            <p>
                C'est à ce moment-là, lorsque la thèse contient des recherches originales, que la figure du directeur prend forme. Ce rôle apparaît en 1918, 
                lorsqu'il a été établi que « les thèses de doctorat de la Faculté des sciences seront présentées et parrainées par un professeur [...] 
                ayant le droit de faire partie du jury ».
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
                <textPath startOffset="50%" xlink:href="#textPathSXX">XXe</textPath>
            </text>
        </svg>
        <div class="main__thesis-history__text">
            <p>
                La création, en 1907, du Conseil pour l'Extension des Études a donné l'impulsion nécessaire pour lancer la recherche en Espagne. 
                Bon nombre des laboratoires alors créés ont vu leur évolution brusquement interrompue par l'arrivée de la guerre civile. 
                De nombreux scientifiques, notamment en physique, tels que Blas Cabrera ou Arturo Duperier, ont été contraints à l'exil.
            </p>
            <p>
                Il faudra attendre les années 50 pour que la physique en Espagne renaisse, en grande partie grâce aux Espagnols qui 
                ont été formés à l'étranger et au travail de certains, comme Julio Palacios, qui l'ont relancée après la guerre. 
                Certains exilés sont revenus, comme Arturo Duperier, mais sans pouvoir développer leur propre école.
            </p>
        </div>
    </section>
    <h5 id="show-bibliography">
        Bibliographie
        <img src="{{ asset('img/dropdown.png') }}" alt="déployable">
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
@include('layouts.common-fr')