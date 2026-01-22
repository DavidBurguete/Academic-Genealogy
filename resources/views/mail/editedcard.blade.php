<h1>Tarjeta editada: {{ $previousDoctor['name'] }} {{ $previousDoctor['surname1'] }}</h1>
<h2>Se ha editado una <b>tarjeta de doctor</b>: {{ $root }}/es/card?id={{ $previousDoctor['id'] }}</h2>
<b>A continuación se listan únicamente los datos <i>modificados</i></b>
<ul>
    @if(array_key_exists('name', $differ))<li>Nombre: {{ $previousDoctor->name }} -> {{ $differ['name'] }}</li> @endif
    @if(array_key_exists('surname1', $differ))<li>Primer apellido: {{ $previousDoctor->surname1 }} -> {{ $differ['surname1'] }}</li> @endif
    @if(array_key_exists('surname2', $differ))<li>Segundo apellido: {{$differ['surname2']}}</li> @endif
    @if(array_key_exists('thesistitle', $differ))<li>Tesis: {{ $previousDoctor->thesistitle }} -> {{$differ['thesistitle']}}</li> @endif
    @if(array_key_exists('defensedate', $differ))<li>Fecha de la defensa: {{ $previousDoctor->defensedate }} -> {{$differ['defensedate']}}</li> @endif
    @if(array_key_exists('unknownexactdate', $differ))<li>Fecha exacta desconocida: {{ $previousDoctor->unknownexactdate }} -> {{$differ['unknownexactdate']}}</li> @endif
    @if(array_key_exists('faculty', $differ))<li>Facultad: {{ $previousDoctor->faculty }} -> {{$differ['faculty']}}</li> @endif
    @if(array_key_exists('city', $differ))<li>Ciudad: {{ $previousDoctor->city }} -> {{$differ['city']}}</li> @endif
    @if(array_key_exists('university', $differ))<li>Universidad: {{ $previousDoctor->university }} -> {{$differ['university']}}</li> @endif
    @if(array_key_exists('birthdate', $differ))<li>Fecha de nacimiento: {{ $previousDoctor->birthdate }} -> {{$differ['birthdate']}}</li> @endif
    @if(array_key_exists('deathdate', $differ))<li>Fecha de defunción: {{ $previousDoctor->deathdate }} -> {{$differ['deathdate']}}</li> @endif
    @if(array_key_exists('teseoid', $differ))<li>ID TESEO: {{ $previousDoctor->teseoid }} -> {{$differ['teseoid']}}</li> @endif
</ul>
@if(sizeof($directorsToAdd) > 0)
    <hr>
    <p>DIRECTORES AÑADIDOS:</p>
    <ul>
        @foreach($directorsToAdd as $directorID => $relationtype)
            <li>{{ $directorID }} ({{ \App\Models\Doctors::where('id', $directorID)->first()->name }} {{ \App\Models\Doctors::where('id', $directorID)->first()->surname1 }}) - {{ $relationtype == 'D' ? 'D (Director)' : 'M (Mentor)' }}</li>
        @endforeach
    </ul>
@endif
@if(sizeof($directorsToUpdate) > 0)
    <hr>
    <p>DIRECTORES MODIFICADOS:</p>
    <ul>
        @foreach($directorsToUpdate as $directorID => $relationtype)
            <li>{{ $directorID }} ({{ \App\Models\Doctors::where('id', $directorID)->first()->name }} {{ \App\Models\Doctors::where('id', $directorID)->first()->surname1 }}) - {{ $relationtype != 'D' ? 'D (Director)' : 'M (Mentor)' }} -> {{ $relationtype == 'D' ? 'D (Director)' : 'M (Mentor)' }}</li>
        @endforeach
    </ul>
@endif
@if(sizeof($directorsToDelete) > 0)
    <hr>
    <p>DIRECTORES ELIMINADOS:</p>
    <ul>
        @foreach($directorsToDelete as $directorID)
            <li>{{ $directorID }} ({{ \App\Models\Doctors::where('id', $directorID)->first()->name }} {{ \App\Models\Doctors::where('id', $directorID)->first()->surname1 }}) - {{ \App\Models\Relations::where('directorID', $directorID)->where('studentID', $previousDoctor->id)->first()->relationtype }}</li>
        @endforeach
    </ul>
@endif
@if(sizeof($studentsToAdd) > 0)
    <hr>
    <p>ESTUDIANTES AÑADIDOS:</p>
    <ul>
        @foreach($studentsToAdd as $studentID)
            <li>{{ $studentID }} ({{ \App\Models\Doctors::where('id', $studentID)->first()->name }} {{ \App\Models\Doctors::where('id', $studentID)->first()->surname1 }})</li>
        @endforeach
    </ul>
@endif
@if(sizeof($studentsToDelete) > 0)
    <hr>
    <p>ESTUDIANTES ELIMINADOS:</p>
    <ul>
        @foreach($studentsToDelete as $studentID)
            <li>{{ $studentID }} ({{ \App\Models\Doctors::where('id', $studentID)->first()->name }} {{ \App\Models\Doctors::where('id', $studentID)->first()->surname1 }})</li>
        @endforeach
    </ul>
@endif
<hr style="border: 4px solid #222222; width: 100%;">
<h1>Card edited: {{ $previousDoctor['name'] }} {{ $previousDoctor['surname1'] }}</h1>
<h2>A <b>doctor card</b> has been edited: {{ $root }}/en/card?id={{ $previousDoctor['id'] }}</h2>
<b>Below are listed only the <i>modified</i> data:</b>
<ul>
    @if(array_key_exists('name', $differ))<li>Name: {{ $previousDoctor->name }} -> {{ $differ['name'] }}</li> @endif
    @if(array_key_exists('surname1', $differ))<li>First surname: {{ $previousDoctor->surname1 }} -> {{ $differ['surname1'] }}</li> @endif
    @if(array_key_exists('surname2', $differ))<li>Second surname: {{$differ['surname2']}}</li> @endif
    @if(array_key_exists('thesistitle', $differ))<li>Thesis: {{ $previousDoctor->thesistitle }} -> {{$differ['thesistitle']}}</li> @endif
    @if(array_key_exists('defensedate', $differ))<li>Defense date: {{ $previousDoctor->defensedate }} -> {{$differ['defensedate']}}</li> @endif
    @if(array_key_exists('unknownexactdate', $differ))<li>Exact date unknown: {{ $previousDoctor->unknownexactdate }} -> {{$differ['unknownexactdate']}}</li> @endif
    @if(array_key_exists('faculty', $differ))<li>Faculty: {{ $previousDoctor->faculty }} -> {{$differ['faculty']}}</li> @endif
    @if(array_key_exists('city', $differ))<li>City: {{ $previousDoctor->city }} -> {{$differ['city']}}</li> @endif
    @if(array_key_exists('university', $differ))<li>University: {{ $previousDoctor->university }} -> {{$differ['university']}}</li> @endif
    @if(array_key_exists('birthdate', $differ))<li>Birthdate: {{ $previousDoctor->birthdate }} -> {{$differ['birthdate']}}</li> @endif
    @if(array_key_exists('deathdate', $differ))<li>Deathdate: {{ $previousDoctor->deathdate }} -> {{$differ['deathdate']}}</li> @endif
    @if(array_key_exists('teseoid', $differ))<li>TESEO ID: {{ $previousDoctor->teseoid }} -> {{$differ['teseoid']}}</li> @endif
</ul>
@if(sizeof($directorsToAdd) > 0)
    <hr>
    <p>ADDED DIRECTORS:</p>
    <ul>
        @foreach($directorsToAdd as $directorID => $relationtype)
            <li>{{ $directorID }} ({{ \App\Models\Doctors::where('id', $directorID)->first()->name }} {{ \App\Models\Doctors::where('id', $directorID)->first()->surname1 }}) - {{ $relationtype == 'D' ? 'D (Director)' : 'M (Mentor)' }}</li>
        @endforeach
    </ul>
@endif
@if(sizeof($directorsToUpdate) > 0)
    <hr>
    <p>MODIFIED DIRECTORS:</p>
    <ul>
        @foreach($directorsToUpdate as $directorID => $relationtype)
            <li>{{ $directorID }} ({{ \App\Models\Doctors::where('id', $directorID)->first()->name }} {{ \App\Models\Doctors::where('id', $directorID)->first()->surname1 }}) - {{ $relationtype != 'D' ? 'D (Director)' : 'M (Mentor)' }} -> {{ $relationtype == 'D' ? 'D (Director)' : 'M (Mentor)' }}</li>
        @endforeach
    </ul>
@endif
@if(sizeof($directorsToDelete) > 0)
    <hr>
    <p>DELETED DIRECTORS:</p>
    <ul>
        @foreach($directorsToDelete as $directorID)
            <li>{{ $directorID }} ({{ \App\Models\Doctors::where('id', $directorID)->first()->name }} {{ \App\Models\Doctors::where('id', $directorID)->first()->surname1 }}) - {{ \App\Models\Relations::where('directorID', $directorID)->where('studentID', $previousDoctor->id)->first()->relationtype }}</li>
        @endforeach
    </ul>
@endif
@if(sizeof($studentsToAdd) > 0)
    <hr>
    <p>ADDED STUDENTS:</p>
    <ul>
        @foreach($studentsToAdd as $studentID)
            <li>{{ $studentID }} ({{ \App\Models\Doctors::where('id', $studentID)->first()->name }} {{ \App\Models\Doctors::where('id', $studentID)->first()->surname1 }})</li>
        @endforeach
    </ul>
@endif
@if(sizeof($studentsToDelete) > 0)
    <hr>
    <p>DELETED STUDENTS:</p>
    <ul>
        @foreach($studentsToDelete as $studentID)
            <li>{{ $studentID }} ({{ \App\Models\Doctors::where('id', $studentID)->first()->name }} {{ \App\Models\Doctors::where('id', $studentID)->first()->surname1 }})</li>
        @endforeach
    </ul>
@endif
<hr style="border: 4px solid #222222; width: 100%;">
<h1>Fiche éditée: {{ $previousDoctor['name'] }} {{ $previousDoctor['surname1'] }}</h1>
<h2>Une <b>fiche de docteur</b> a été éditée: {{ $root }}/fr/card?id={{ $previousDoctor['id'] }}</h2>
<b>Seules les données <i>modifiées</i> sont listées ci-dessous</b>
<ul>
    @if(array_key_exists('name', $differ))<li>Prenom: {{ $previousDoctor->name }} -> {{ $differ['name'] }}</li> @endif
    @if(array_key_exists('surname1', $differ))<li>Premier nom de famille: {{ $previousDoctor->surname1 }} -> {{ $differ['surname1'] }}</li> @endif
    @if(array_key_exists('surname2', $differ))<li>Deuxième nom de famille: {{$differ['surname2']}}</li> @endif
    @if(array_key_exists('thesistitle', $differ))<li>Thèse: {{ $previousDoctor->thesistitle }} -> {{$differ['thesistitle']}}</li> @endif
    @if(array_key_exists('defensedate', $differ))<li>Date de la soutenance: {{ $previousDoctor->defensedate }} -> {{$differ['defensedate']}}</li> @endif
    @if(array_key_exists('unknownexactdate', $differ))<li>Date exacte inconnue: {{ $previousDoctor->unknownexactdate }} -> {{$differ['unknownexactdate']}}</li> @endif
    @if(array_key_exists('faculty', $differ))<li>Faculté: {{ $previousDoctor->faculty }} -> {{$differ['faculty']}}</li> @endif
    @if(array_key_exists('city', $differ))<li>Ville: {{ $previousDoctor->city }} -> {{$differ['city']}}</li> @endif
    @if(array_key_exists('university', $differ))<li>Université: {{ $previousDoctor->university }} -> {{$differ['university']}}</li> @endif
    @if(array_key_exists('birthdate', $differ))<li>Date de naissance: {{ $previousDoctor->birthdate }} -> {{$differ['birthdate']}}</li> @endif
    @if(array_key_exists('deathdate', $differ))<li>Date de décès: {{ $previousDoctor->deathdate }} -> {{$differ['deathdate']}}</li> @endif
    @if(array_key_exists('teseoid', $differ))<li>TESEO ID: {{ $previousDoctor->teseoid }} -> {{$differ['teseoid']}}</li> @endif
</ul>
@if(sizeof($directorsToAdd) > 0)
    <hr>
    <p>DIRECTEURS AJOUTÉS:</p>
    <ul>
        @foreach($directorsToAdd as $directorID => $relationtype)
            <li>{{ $directorID }} ({{ \App\Models\Doctors::where('id', $directorID)->first()->name }} {{ \App\Models\Doctors::where('id', $directorID)->first()->surname1 }}) - {{ $relationtype == 'D' ? 'D (Director)' : 'M (Mentor)' }}</li>
        @endforeach
    </ul>
@endif
@if(sizeof($directorsToUpdate) > 0)
    <hr>
    <p>DIRECTEURS MODIFIÉS:</p>
    <ul>
        @foreach($directorsToUpdate as $directorID => $relationtype)
            <li>{{ $directorID }} ({{ \App\Models\Doctors::where('id', $directorID)->first()->name }} {{ \App\Models\Doctors::where('id', $directorID)->first()->surname1 }}) - {{ $relationtype != 'D' ? 'D (Director)' : 'M (Mentor)' }} -> {{ $relationtype == 'D' ? 'D (Director)' : 'M (Mentor)' }}</li>
        @endforeach
    </ul>
@endif
@if(sizeof($directorsToDelete) > 0)
    <hr>
    <p>DIRECTORES SUPPRIMÉS:</p>
    <ul>
        @foreach($directorsToDelete as $directorID)
            <li>{{ $directorID }} ({{ \App\Models\Doctors::where('id', $directorID)->first()->name }} {{ \App\Models\Doctors::where('id', $directorID)->first()->surname1 }}) - {{ \App\Models\Relations::where('directorID', $directorID)->where('studentID', $previousDoctor->id)->first()->relationtype }}</li>
        @endforeach
    </ul>
@endif
@if(sizeof($studentsToAdd) > 0)
    <hr>
    <p>ÉTUDIANTS AJOUTÉS:</p>
    <ul>
        @foreach($studentsToAdd as $studentID)
            <li>{{ $studentID }} ({{ \App\Models\Doctors::where('id', $studentID)->first()->name }} {{ \App\Models\Doctors::where('id', $studentID)->first()->surname1 }})</li>
        @endforeach
    </ul>
@endif
@if(sizeof($studentsToDelete) > 0)
    <hr>
    <p>ÉTUDIANTS SUPPRIMÉS:</p>
    <ul>
        @foreach($studentsToDelete as $studentID)
            <li>{{ $studentID }} ({{ \App\Models\Doctors::where('id', $studentID)->first()->name }} {{ \App\Models\Doctors::where('id', $studentID)->first()->surname1 }})</li>
        @endforeach
    </ul>
@endif