
@extends('others.app')


@push('styles')
    <link rel="stylesheet" href="{{asset('css/Produktdescription.css')}}">
    <link rel = "stylesheet" href = "{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/trolley.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush




@section('content')
<div class="main_container">
    <div class="product">
        <div class="gallery">
            <div class="main-board">
                <img src="{{ asset($product->mainPhoto->image_URL) }}"
                     alt="{{ $product->title }}" id="mainImage" class="main-image">
            </div>
            <div class="thumbnails">
                @foreach($product->photos as $photo)
                    <img src="{{ asset($photo->image_URL) }}" alt="{{ $product->title }} " class="thumbnail">
                @endforeach
            </div>
        </div>
        <div class="lil_description">
            <h3>{{ $product->title }}</h3>
            <div class="short_description">
                <p>{{ $product->short_descr }}</p>
            </div>
            <div class="year_model">
                <p class="short_description_special">Značka:</p>
                <p class="short_description_year">{{$product->brand->name}}</p>
            </div>
            <div class="year_model">
                <p class="short_description_special">Typ:</p>
                <p class="short_description_year">{{$product->type->name}}</p>
            </div>
            <p class="short_description">Veľkosť:</p>
            <form method="POST" action="{{ route('cart.store', $product) }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <input type="hidden" name="size" id="selectedSize" value="">

                <div class="size">
                    <div class="size-options">

                        @foreach($sizes as $label => $available)
                            <input
                                type="button"
                                class="size-option {{ $available ? '' : 'disabled' }}"
                                data-size="{{ $label }}"
                                data-available="{{ $available }}"
                                value="{{ $label }}" {{ $available ? '' : 'disabled' }}
                            >
                        @endforeach
                    </div>
                </div>


                <div class="store">
                    <p class="dostupnost">Dostupnosť:</p>
                    <p class="is_dostupnost"></p>
                </div>
                <div class="price">
                    <p class="short_description">Cena:</p>
                    <p class="short_description_price">{{ $product->price }} €</p>
                </div>
                <div class="quantity_buy">
                    <div class="quantity-selector">
                        <button type="button" id="qtyMinus" class="qty-btn minus">-</button>
                        <input type="text" name="quantity" id="qtyInput" class="qty-input" value="{{ old('quantity',1) }}" min="1" readonly>
                        <button type="button" id="qtyPlus" class="qty-btn plus">+</button>
                    </div>
                    <button type="submit" class="add-to-cart">Vložiť do košíka</button>
                </div>
            </form>
        </div>
    </div>
    <div class="description_container">
        <h3 class="popis">Popis</h3>
        <div class="description">
            <p>
                {{$product->long_descr}}
            </p>
        </div>
    </div>

    <h3 class="zaujimat">Mohlo by vás zaujímať</h3>

    <div class="button_novinky_akcia">
        <a href = "{{ route('products.group', 2) }}" class="button_novinky">Novinky</a>
    </div>

    <div class="novinky">
        @forelse($novinky as $product)
            @include('partials.product_card', ['product' => $product])
        @empty
            <p class="col-span-4 text-center">Žiadne novinky k dispozícii.</p>
        @endforelse
    </div>

    <script src="{{asset('script/available.js')}}"></script>
    <script src="{{asset('script/script_home.js')}}"></script>

</div>
@endsection()


