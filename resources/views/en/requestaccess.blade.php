@extends('layouts.account')
@section('website-name')
Academic<br>Genealogy
@endsection

@section('destination')
request-access
@endsection

@section('form')
    @if(sizeof($errors) >= 1)
        <script>
            Toastify({
                text: "Please, fill in all the fields",
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
                    background: "#DE1919",
                }
            }).showToast();
        </script>
    @endif
    <h2>Request form</h2>
    <input name="name" id="name" value="{{ old('name') }}" type="text" placeholder="Full name">
    <input name="email" id="email" value="{{ old('email') }}" type="email" placeholder="Email address">
    <div class="actions">
        <a href="{{ url()->previous() }}">
            <img src="{{ asset('/img/return.svg') }}" alt="Return button">
        </a>
        <button type="submit">Request access</button>
    </div>
    <p>You already have credentials? <a href="/en/login">Login</a></p>
@endsection

@section('languages')
    <a href="/es/request-access"><img src="{{ asset('img/spanish.png') }}" alt="spanish language"></a>
    <a><img src="{{ asset('img/english.png') }}" alt="english language"></a>
    <a href="/fr/request-access"><img src="{{ asset('img/french.png') }}" alt="french language"></a>
@endsection