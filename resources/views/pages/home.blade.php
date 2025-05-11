
@extends('others.app')

@section('content')
    <div class="add_pictures">
        <img src="images\bicycle.jpg" alt="picture" id="slideshow" class="main_image">
    </div>

    <div class="brands">
        <div class="brand1">
            <img src="images\head.webp" alt="head">
        </div>
        <div class="brand1">
            <img src="images\salomon.jpeg" alt="salomon">
        </div>
        <div class="brand1">
            <img src="images\blizard.jpg" alt="blizard">
        </div>
        <div class="brand1">
            <img src="images\rossignol.png" alt="rossignol">
        </div>
        <div class="brand2">
            <img src="images\specialized.jpg" alt="specialized">
        </div>
        <div class="brand2">
            <img src="images\scott.jpg" alt="scott">
        </div>
        <div class="brand1">
            <img src="images\ghost.png" alt="ghost">
        </div>
        <div class="brand1">
            <img src="images\trek.jpg" alt="trek">
        </div>
    </div>

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


    <div class="button_novinky_akcia">
        <a href = "{{ route('products.group', 3) }}" class="button_novinky">Akcie</a>
    </div>


    <div class="novinky">
        @forelse($akcie as $product)
            @include('partials.product_card', ['product' => $product])
        @empty
            <p class="col-span-4 text-center">Žiadne akcie k dispozícii.</p>
        @endforelse
    </div>
@endsection('content')
