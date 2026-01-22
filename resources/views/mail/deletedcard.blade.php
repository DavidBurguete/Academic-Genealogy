<h1>Tarjeta eliminada: {{ $data['name'] }} {{ $data['surname1'] }}</h1>
<h2>Se ha eliminado una <b>tarjeta de doctor</b></h2>
<b>A continuación se listan los datos:</b>
<ul>
    <li>ID: {{ $data['id'] }}</li>
    <li>Nombre: {{ $data['name'] }}</li>
    <li>Primer apellido: {{ $data['surname1'] }}</li>
    <li>Segundo apellido: {!! is_null($data['surname2']) ? '<i>(Vacío)</i>' : $data['surname2'] !!}</li>
    <li>Tesis: {!! is_null($data['thesistitle']) ? '<i>(Vacío)</i>' : $data['thesistitle'] !!}</li>
    <li>Fecha de la defensa: {!! is_null($data['defensedate']) ? '<i>(Vacío)</i>' : $data['defensedate'] !!}</li>
    <li>Fecha exacta desconocida: {!! is_null($data['unknownexactdate']) ? '<i>(Vacío)</i>' : $data['unknownexactdate'] !!}</li>
    <li>Facultad: {!! is_null($data['faculty']) ? '<i>(Vacío)</i>' : $data['faculty'] !!}</li>
    <li>Ciudad: {!! is_null($data['city']) ? '<i>(Vacío)</i>' : $data['city'] !!}</li>
    <li>Universidad: {!! is_null($data['university']) ? '<i>(Vacío)</i>' : $data['university'] !!}</li>
    <li>Fecha de nacimiento: {!! is_null($data['birthdate']) ? '<i>(Vacío)</i>' : $data['birthdate'] !!}</li>
    <li>Fecha de defunción: {!! is_null($data['deathdate']) ? '<i>(Vacío)</i>' : $data['deathdate'] !!}</li>
    <li>ID TESEO: {!! is_null($data['teseoid']) ? '<i>(Vacío)</i>' : $data['teseoid'] !!}</li>
</ul>
<hr>
<p>DIRECTORES:</p>
@if(!$directors->isEmpty())
    <ul>
        @foreach($directors as $director)
            <li>{{ $director->directorID }} ({{ \App\Models\Doctors::where('id', $director->directorID)->first()->name }} {{ \App\Models\Doctors::where('id', $director->directorID)->first()->surname1 }}) - {{ $director->relationtype == 'D' ? 'D (Director)' : 'M (Mentor)' }}</li>
        @endforeach
    </ul>
@else
    <i>(Vacío)</i>
@endif
<hr>
<p>ESTUDIANTES:</p>
@if(!$students->isEmpty())
    <ul>
        @foreach($students as $student)
            <li>{{ $student->studentID }} ({{ \App\Models\Doctors::where('id', $student->studentID)->first()->name }} {{ \App\Models\Doctors::where('id', $student->studentID)->first()->surname1 }})</li>
        @endforeach
    </ul>
@else
    <i>(Vacío)</i>
@endif
<hr style="border: 4px solid #222222; width: 100%;">
<h1>Card deleted: {{ $data['name'] }} {{ $data['surname1'] }}</h1>
<h2>A <b>doctor card</b> has been deleted</h2>
<b>The data is listed below:</b>
<ul>
    <li>ID: {{ $data['id'] }}</li>
    <li>Name: {{ $data['name'] }}</li>
    <li>First surname: {{ $data['surname1'] }}</li>
    <li>Second surname: {!! is_null($data['surname2']) ? '<i>(Empty)</i>' : $data['surname2'] !!}</li>
    <li>Thesis: {!! is_null($data['thesistitle']) ? '<i>(Empty)</i>' : $data['thesistitle'] !!}</li>
    <li>Date of defense: {!! is_null($data['defensedate']) ? '<i>(Empty)</i>' : $data['defensedate'] !!}</li>
    <li>Exact date unknown: {!! is_null($data['unknownexactdate']) ? '<i>(Empty)</i>' : $data['unknownexactdate'] !!}</li>
    <li>Faculty: {!! is_null($data['faculty']) ? '<i>(Empty)</i>' : $data['faculty'] !!}</li>
    <li>City: {!! is_null($data['city']) ? '<i>(Empty)</i>' : $data['city'] !!}</li>
    <li>University: {!! is_null($data['university']) ? '<i>(Empty)</i>' : $data['university'] !!}</li>
    <li>Birthdate: {!! is_null($data['birthdate']) ? '<i>(Empty)</i>' : $data['birthdate'] !!}</li>
    <li>Deathdate: {!! is_null($data['deathdate']) ? '<i>(Empty)</i>' : $data['deathdate'] !!}</li>
    <li>TESEO ID: {!! is_null($data['teseoid']) ? '<i>(Empty)</i>' : $data['teseoid'] !!}</li>
</ul>
<hr>
<p>DIRECTORS:</p>
@if(!$directors->isEmpty())
    <ul>
        @foreach($directors as $director)
            <li>{{ $director->directorID }} ({{ \App\Models\Doctors::where('id', $director->directorID)->first()->name }} {{ \App\Models\Doctors::where('id', $director->directorID)->first()->surname1 }}) - {{ $director->relationtype == 'D' ? 'D (Director)' : 'M (Mentor)' }}</li>
        @endforeach
    </ul>
@else
    <i>(Empty)</i>
@endif
<hr>
<p>STUDENTS:</p>
@if(!$students->isEmpty())
    <ul>
        @foreach($students as $student)
            <li>{{ $student->studentID }} ({{ \App\Models\Doctors::where('id', $student->studentID)->first()->name }} {{ \App\Models\Doctors::where('id', $student->studentID)->first()->surname1 }})</li>
        @endforeach
    </ul>
@else
    <i>(Empty)</i>
@endif
<hr style="border: 4px solid #222222; width: 100%;">
<h1>Fiche créée: {{ $data['name'] }} {{ $data['surname1'] }}</h1>
<h2>Une <b>fiche de docteur</b> a été supprimée</h2>
<b>Les données suivantes sont listées ci-dessous:</b>
<ul>
    <li>ID: {{ $data['id'] }}</li>
    <li>Prénom: {{ $data['name'] }}</li>
    <li>Premier nom de famille: {{ $data['surname1'] }}</li>
    <li>Deuxième nom de famille: {!! is_null($data['surname2']) ? '<i>(Vide)</i>' : $data['surname2'] !!}</li>
    <li>Thèse: {!! is_null($data['thesistitle']) ? '<i>(Vide)</i>' : $data['thesistitle'] !!}</li>
    <li>Date de la soutenance: {!! is_null($data['defensedate']) ? '<i>(Vide)</i>' : $data['defensedate'] !!}</li>
    <li>Date exacte inconnue: {!! is_null($data['unknownexactdate']) ? '<i>(Vide)</i>' : $data['unknownexactdate'] !!}</li>
    <li>Faculté: {!! is_null($data['faculty']) ? '<i>(Vide)</i>' : $data['faculty'] !!}</li>
    <li>Ville: {!! is_null($data['city']) ? '<i>(Vide)</i>' : $data['city'] !!}</li>
    <li>Université: {!! is_null($data['university']) ? '<i>(Vide)</i>' : $data['university'] !!}</li>
    <li>Date de naissance: {!! is_null($data['birthdate']) ? '<i>(Vide)</i>' : $data['birthdate'] !!}</li>
    <li>Date de décès: {!! is_null($data['deathdate']) ? '<i>(Vide)</i>' : $data['deathdate'] !!}</li>
    <li>TESEO ID: {!! is_null($data['teseoid']) ? '<i>(Vide)</i>' : $data['teseoid'] !!}</li>
</ul>
<hr>
<p>DIRECTEURS:</p>
@if(!$directors->isEmpty())
    <ul>
        @foreach($directors as $directorID => $relationtype)
            <li>{{ $director->directorID }} ({{ \App\Models\Doctors::where('id', $director->directorID)->first()->name }} {{ \App\Models\Doctors::where('id', $director->directorID)->first()->surname1 }}) - {{ $director->relationtype == 'D' ? 'D (Directeur)' : 'M (Mentor)' }}</li>
        @endforeach
    </ul>
@else
    <i>(Vide)</i>
@endif
<hr>
<p>ÉTUDIANTS:</p>
@if(!$students->isEmpty())
    <ul>
        @foreach($students as $student)
            <li>{{ $student->studentID }} ({{ \App\Models\Doctors::where('id', $student->studentID)->first()->name }} {{ \App\Models\Doctors::where('id', $student->studentID)->first()->surname1 }})</li>
        @endforeach
    </ul>
@else
    <i>(Vide)</i>
@endif