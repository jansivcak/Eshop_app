

@extends('others.app')


@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin_add.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{asset('css/paggination.css')}}">
@endpush




@section('content')
    <div class="main-container">
        <div class="filter_bar">
            <form method="GET" action="{{ route('admin.show.products') }}">
              <div class="sort-container">
                {{-- Skupiny --}}
                <select name="group" class="sortSelect">
                    <option value="">Všetky skupiny</option>
                    @foreach($groups as $g)
                        <option value="{{ $g->id }}"
                            {{ $selectedGroup == $g->id ? 'selected' : '' }}>
                            {{ $g->name }}
                        </option>
                    @endforeach
                </select>


                <select name="category_id" class="sortSelect">
                    <option value="">Všetky kategórie</option>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}"
                            {{ $selectedCategory == $c->id ? 'selected' : '' }}>
                            {{ $c->name }}
                        </option>
                    @endforeach
                </select>


                <select name="type" class="sortSelect">
                    <option value="">Všetky typy</option>
                    @foreach($types as $t)
                        <option value="{{ $t->id }}"
                            {{ $selectedType == $t->id ? 'selected' : '' }}>
                            {{ $t->name }}
                        </option>
                    @endforeach
                </select>


                <select name="brand" class="sortSelect">
                    <option value="">Všetky značky</option>
                    @foreach($brands as $b)
                        <option value="{{ $b->id }}"
                            {{ $selectedBrand == $b->id ? 'selected' : '' }}>
                            {{ $b->name }}
                        </option>
                    @endforeach
                </select>


                <select name="gender" class="sortSelect">
                    <option value="">Všetky pohlavia</option>
                    @foreach($genders as $key => $label)
                        <option value="{{ $key }}"
                            {{ $selectedGender == $key ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>

                <button type="submit" class="sortButton">Hľadaj</button>
              </div>
            </form>
        </div>
      <div class="add_product">
          <a href="{{ route('admin.show.add') }}">
            <button class="ADDButton" id="addButton">
              <img src="{{ asset('ig_icons/icon_add.svg') }}" alt="Add">
              <a>Pridať produkt</a>
            </button>
          </a>
      </div>
    </div>


    <div class="products_board">
        @forelse($products as $product)
            @include('partials.product_edit', ['product' => $product])
        @empty
            <p class="col-span-3 text-center">Žiadne produkty pre zadané kritériá.</p>
        @endforelse
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


