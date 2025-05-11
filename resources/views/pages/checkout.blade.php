

@extends('others.app')


@push('styles')
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
@endpush



@section('content')
    <main>
        <h1>Informácie o Vás</h1>
        <div class="cart-steps">
            <button onclick="location.href=''">Košík</button>
            <button class="active">Dodacie údaje</button>
            <button onclick="location.href=''">Doprava a platba</button>
        </div>

    </main>
    <form method="POST" action="{{ route('checkout.store') }}">
        @csrf
        <div class="main-container-account">
            <div class="account">
                @if ($errors->any())
                    <div class="error-messages">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <span style="text-align: center;">{{ $error }}</span>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="content">
                    <div class="row">
                        <p>Meno:</p>
                        <input class="field-information" type="text" name="name" value="{{ old('name', $user->name ?? '') }}" required>
                    </div>
                    <div class="row">
                        <p>Priezvisko:</p>
                        <input class="field-information" type="text" name="surname" value="{{ old('surname', $user->surname ?? '') }}" required>
                    </div>
                    <div class="row">
                        <p>Email:</p>
                        <input class="field-information" type="text" name="email" value="{{ old('email', $user->email ?? '') }}" required>
                    </div>
                    <div class="row">
                        <p>Telefón:</p>
                        <input class="field-information" type="text" name="phone" value="{{ old('phone', $user->phone ?? '') }}" required>
                    </div>
                    <div class="row">
                        <p>Ulica:</p>
                        <input class="field-information" type="text" name="adress" value="{{ old('adress', $user->adress ?? '') }}" required>
                    </div>
                    <div class="row">
                        <p>Mesto:</p>
                        <input class="field-information" type="text" name="town" value="{{ old('town', $user->town ?? '') }}" required>
                    </div>
                    <div class="row">
                        <p>PSČ:</p>
                        <input class="field-information" type="text" name="zip" value="{{ old('zip', $user->zip ?? '') }}" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="cart-summary">
            <button type="submit" class="btn btn-continue">Pokračovať</button>
        </div>
    </form>
@endsection


