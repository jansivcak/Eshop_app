

@extends('others.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
@endpush


@section('content')
    <main>
        <h1>Doprava a platba</h1>
        <form method="POST" action="{{ route('payment.store') }}">
            @csrf

            <div class="cart-steps">
                <button onclick="location.href=''" type="button">Košík</button>
                <button onclick="location.href=''" type="button">Dodacie údaje</button>
                <button class="active" type="button">Doprava a platba</button>
            </div>

            <section>
                <h2>Zvoľte spôsob doručenia</h2>
                <div class="option-group">
                    <label><input type="radio" name="shipping" value="predajna" required> Predajňa</label>
                    <label><input type="radio" name="shipping" value="kurier_adresa"> Kuriérom na adresu</label>
                </div>
            </section>

            <section>
                <h2>Zvoľte spôsob platby</h2>
                <div class="option-group">
                    <label><input type="radio" name="payment" value="card" onchange="togglePaymentFields()" required> Platba kartou</label>
                    <label><input type="radio" name="payment" value="cash" onchange="togglePaymentFields()"> Dobierka</label>
                </div>

                <div id="card-fields" style="display:none; margin-top: 1rem;">
                    <h3>Údaje o karte</h3>
                    <label>Číslo karty:
                        <input type="text" name="card_number" maxlength="16">
                    </label>
                    <label>Platnosť:
                        <input type="text" name="card_expiry" placeholder="MM/RR">
                    </label>
                    <label>CVV:
                        <input type="text" name="card_cvv" maxlength="4">
                    </label>
                </div>
            </section>

            <div class="cart-summary">
                <h2>Cart Totals</h2>
                <p>Total: <span>{{ number_format($total, 2) }} €</span></p>
                <button class="btn btn-continue" type="submit">Zaplatiť</button>
                <a href="{{ route('cart.show') }}" class="icon-liked">
                    <button class="btn btn-back" type="button">Späť do obchodu</button>
                </a>
            </div>
        </form>
    </main>

@endsection

@push('scripts')
    <script src="{{asset('script/pay_card.js')}}"></script>
@endpush
