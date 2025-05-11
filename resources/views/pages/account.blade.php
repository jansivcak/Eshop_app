
@extends('others.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/account.css') }}">
@endpush

@section('content')
    <div class="main-container-account">
        <form method="POST" action="{{ route('account.update') }}" class="account">
            @csrf
            @method('PUT')

            <div class="title">
                <p>Môj účet</p>
            </div>

            @if(session('status'))
                <div class="alert-success">{{ session('status') }}</div>
            @endif

            <div class="content">

                <div class="row">
                    <label for="name">Meno:</label>

                        <input class="field-information" type="text" id="name" name="name"
                               value="{{ old('name', $user->name) }}" required>
                        @error('name')
                        <div class="error">{{ $message }}</div>
                        @enderror

                </div>


                <div class="row">
                    <label for="surname">Priezvisko:</label>
                    <input class="field-information" type="text" id="surname" name="surname"
                           value="{{ old('surname', $user->surname) }}" required>
                    @error('surname')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>


                <div class="row">
                    <label for="email">Email:</label>
                    <input class="field-information" type="email" id="email" name="email"
                           value="{{ old('email', $user->email) }}" required>
                    @error('email')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>


                <div class="row">
                    <label for="phone">Telefón:</label>
                    <input class="field-information" type="text" id="phone" name="phone"
                           value="{{ old('phone', $user->phone) }}">
                    @error('phone')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>


                <div class="row">
                    <label for="adress">Ulica:</label>
                    <input class="field-information" type="text" id="adress" name="adress"
                           value="{{ old('adress', $user->adress) }}">
                    @error('adress')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>


                <div class="row">
                    <label for="zip">PSČ:</label>
                    <input class="field-information" type="text" id="zip" name="zip"
                           value="{{ old('zip', $user->zip) }}">
                    @error('zip')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>


                <div class="row">
                    <label for="town">Mesto:</label>
                    <input class="field-information" type="text" id="town" name="town"
                           value="{{ old('town', $user->town) }}">
                    @error('town')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>


                <div class="row">
                    <label for="current_password">Súčasné heslo:</label>
                    <input class="field-information" type="password" id="current_password" name="current_password">
                    @error('current_password')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>


                <div class="row">
                    <label for="new_password">Nové heslo:</label>
                    <input class="field-information" type="password" id="new_password" name="new_password">
                    @error('new_password')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>


                <div class="row">
                    <label for="new_password_confirmation">Potvrď nové heslo:</label>
                    <input class="field-information" type="password" id="new_password_confirmation" name="new_password_confirmation">
                </div>

            </div>

            <button type="submit" class="save-button">Uložiť</button>

        </form>
    </div>
@endsection
