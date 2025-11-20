@extends('layouts.account')
@section('website-name')
Academic<br>Genealogy
@endsection

@section('form')
    <h2>Access</h2>
    <input id="name" type="text" autocomplete="off" placeholder="Full name">
    <input id="password" type="password" autocomplete="off" placeholder="Password">
    <div class="actions">
        <a href="{{ url()->previous() }}">
            <img src="{{ asset('/img/return.svg') }}" alt="Return button">
        </a>
        <button type="submit">Login</button>
    </div>
    <p>Are you a doctor or professor and want access? <a href="/en/request-access">Request it here</a></p>
@endsection

@section('languages')
    <a href="/es/login"><img src="{{ asset('img/spanish.png') }}" alt="spanish language"></a>
    <a><img src="{{ asset('img/english.png') }}" alt="english language"></a>
    <a href="/fr/login"><img src="{{ asset('img/french.png') }}" alt="french language"></a>
@endsection