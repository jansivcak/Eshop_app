


@extends('others.app')


@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{asset('css/main_product_page.css')}}">
    <link rel="stylesheet" href="{{asset('css/paggination.css')}}">
    <link rel="stylesheet" href="{{asset('css/product_item.css')}}">
    <link rel="stylesheet" href="{{asset('css/input_price.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush


@section('content')
    <div class="main-container">
        <div class="filter">
            @include('partials.filters_search', [
              'types'         => $types,
              'brands'        => $brands,
              'sortSelect'    => $sortSelect,
            ])
        </div>


        <div class="products">
            <h2 style="text-align: center;">Výsledky pre: "{{ $query }}"</h2>
            <div class="products_board">
                @forelse($products as $product)
                    @include('partials.product_card', ['product' => $product])
                @empty
                    <p class="col-span-3 text-center">Žiadne produkty pre zadané kritériá.</p>
                @endforelse
            </div>
        </div>
    </div>

    @if($products->hasPages())
        <ul class="pagination">
            @foreach(range(1, $products->lastPage()) as $page)
                <li>
                    @if($page == $products->currentPage())
                        <a class="active" data-page="{{ $page }}">{{ $page }}</a>
                    @else
                        <a href="{{ $products->url($page) }}" data-page="{{ $page }}">{{ $page }}</a>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
@endsection

