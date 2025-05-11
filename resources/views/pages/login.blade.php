
@extends('others.app_login')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
@endpush

@section('content')
    <h2>Prihlásenie</h2>
    @if ($errors->any())
        <div class="error-messages">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="POST" action="{{ route('login.attempt') }}">
        @csrf

        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>

        <label for="password">Heslo</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" class="btn btn-login">Prihlásiť sa</button>
    </form>


    <a href="{{ route('register') }}">
        <button class="btn btn-register">Nová registrácia</button>
    </a>

@endsection()
