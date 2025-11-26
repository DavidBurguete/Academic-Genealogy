@extends('layouts.account')
@section('website-name')
Academic<br>Genealogy
@endsection

@section('destination')
account
@endsection

@section('form')
    @if(isset($error))
        <script>
            let errorType = "{{ $error }}";
            let error = "";
            switch (errorType) {
                case "FieldError": 
                    error = "Please, complete the fields";
                    break;
                case "NameError": 
                    error = "The specified user does not exist";
                    break;
                case "PasswordError": 
                    error = "The password is incorrect";
                    break;
            }
            Toastify({
                text: error,
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
    <h2>Access</h2>
    <input name="name" id="name" type="text" placeholder="Full name" value="{{ isset($request->name) ? $request->name : '' }}">
    <input name="password" id="password" type="password" placeholder="Password" value="{{ isset($request->password) ? $request->password : '' }}">
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