
@extends('others.app_login')


@push('styles')
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
@endpush

@section('content')
    <h2>Registrácia</h2>
    @if ($errors->any())
        <div class="error-messages">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register.store') }}">
        @csrf

        <label for="first-name">Meno</label>
        <input type="text" id="first-name" name="name" value="{{ old('name') }}" required>

        <label for="last-name">Priezvisko</label>
        <input type="text" id="last-name" name="surname" value="{{ old('surname') }}" required>

        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>

        <label for="telefon">Telefón</label>
        <input type="text" id="telefon" name="phone" value="{{ old('phone') }}" required>

        <label for="ulica">Ulica</label>
        <input type="text" id="ulica" name="adress" value="{{ old('adress') }}" required>

        <label for="mesto">Mesto</label>
        <input type="text" id="mesto" name="town" value="{{ old('town') }}" required>

        <label for="psc">PSČ</label>
        <input type="text" id="psc" name="zip" value="{{ old('zip') }}" required>

        <label for="password">Heslo</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm-password">Potvrdenie hesla</label>
        <input type="password" id="confirm-password" name="password_confirmation" required>

        <button type="submit" class="btn btn-register">Registrovať</button>
    </form>
@endsection()

