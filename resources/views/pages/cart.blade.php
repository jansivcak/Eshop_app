
@extends('others.app')


@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endpush

@section('content')
    <section class="cart-container">
        <h1>Košík</h1>
        <div class="cart-steps">
            <button class="active">Košík</button>
            <button onclick="location.href=''">Dodacie údaje</button>
            <button onclick="location.href=''">Doprava a platba</button>
        </div>

        <div class="cart-content">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Produkt</th>
                        <th>Velkost</th>
                        <th>Cena</th>
                        <th>Množstvo</th>
                        <th>Medzisúčet</th>
                        <th>Odstráň</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>
                            <img src="{{ asset($item->product->mainPhoto->image_URL) }}"
                                 alt="{{ $item->product->title }}" class="small-image"
                            >
                            {{ $item->product->title }}
                        </td>
                        <td> {{ ($item->size) }} </td>
                        <td>{{ number_format($item->product->price, 2) }} €</td>
                        <td>
                            <form method="POST" action="{{ route('cart.update') }}">
                                @csrf

                                <input type="hidden" name="item_id" value="{{ $item->id }}">

                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" onchange="this.form.submit()">
                            </form>
                        </td>
                        <td>
                            {{ number_format($item->product->price * $item->quantity, 2) }} €
                        </td>
                        <td>
                            <form method="POST" action="{{ route('cart.destroy', $item->id) }}" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="remove-btn" aria-label="Odstrániť">Odstrániť</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="cart-summary">
                <h2>Cart Totals</h2>
                <p><strong>Total:</strong> <span class="total-price">{{$total}} €</span></p>
                <a href="{{ route('checkout.show') }}" class = "icon-liked">
                    <button class="checkout-btn">Pokračovať</button>
                    </a>
                <a href="{{ route('home') }}" class = "icon-liked">
                    <button class="back-btn">Späť do obchodu</button>
                    </a>
            </div>
        </div>
    </section>
@endsection
