<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prihlásenie - sportEquip</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="sportEquip">
    </div>

    <h2>Prihlásenie</h2>

    {{-- ZOBRAZENIE CHÝB --}}
    @if ($errors->any())
        <div class="error-messages">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORMULÁR --}}
    <form method="POST" action="{{ route('login.attempt') }}">
        @csrf

        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>

        <label for="password">Heslo</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" class="btn btn-login">Prihlásiť sa</button>
    </form>

    {{-- TLAČIDLO NA REGISTRÁCIU --}}
    <a href="{{ route('register') }}">
        <button class="btn btn-register">Nová registrácia</button>
    </a>

    <div class="footer">© 2025 - 2025 sportEquip</div>
</div>
</body>
</html>
