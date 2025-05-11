


@extends('others.app')


@push('styles')
    <link rel="stylesheet" href="{{asset('css/product_add.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{asset('css/add_bullet.css')}}">
@endpush



@section('content')
    <div class="main-container">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="add-product-container">
                <div class="image-uploader">
                    <div class="thumbnail plus">
                        <label for="main_image">Hlavný obrázok</label><br>
                        <input type="file" name="main_image" id="main_image" accept="image/*" required>
                        @error('main_image') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="thumbnail plus">
                        <label for="images">Galéria (viac súborov)</label><br>
                        <input type="file" name="images[]" id="images" multiple accept="image/*">
                        @error('images.*') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="thumbnail plus">
                        <label for="images">Galéria (viac súborov)</label><br>
                        <input type="file" name="images[]" id="images" multiple accept="image/*">
                        @error('images.*') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="thumbnail plus">
                        <label for="images">Galéria (viac súborov)</label><br>
                        <input type="file" name="images[]" id="images" multiple accept="image/*">
                        @error('images.*') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="add-description">
                    <div class="description-title">
                        <label for="title">Názov:</label>
                        <input type="text" name="title" id="title" class="input" value="{{ old('title') }}" required>
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="description-content">
                        <label for="lil_description">Krátky popis:</label>
                        <textarea name="lil_description" id="lil_description" class="input-lil-description" placeholder="Napíš krátky popis" rows="2"
                        >{{ old('lil_description') }}</textarea>
                        @error('lil_description')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="description-content">
                        <label for="description">Širší popis:</label>
                        <textarea name="description" id="description" class="input-description" placeholder="Napíš popis produktu..." rows="4"
                        >{{ old('description') }}</textarea>
                        @error('description')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="add-category">
                    <div class="category-left">
                        <select class="sortSelect" id="sortSelect_group" name="group_id">
                            @foreach($groups as $id => $label)
                                <option value="{{ $id }}"
                                    {{ old('group_id') == $id ? 'selected' : '' }}
                                >{{ $label }}</option>
                            @endforeach
                        </select>

                        <select class="sortSelect" id="sortSelect_category" name="category_id">
                            @foreach($categories as $id => $label)
                                <option value="{{ $id }}"
                                    {{ old('category_id') == $id ? 'selected' : '' }}
                                >{{ $label }}</option>
                            @endforeach
                        </select>

                        <select class="sortSelect" id="sortSelect_type" name="type_id">
                            @foreach($types as $id => $label)
                                <option value="{{ $id }}"
                                    {{ old('type_id') == $id ? 'selected' : '' }}
                                >{{ $label }}</option>
                            @endforeach
                        </select>
                        <select class="sortSelect" id="sortSelect_brand" name="brand_id">
                            @foreach($brands as $id => $label)
                                <option value="{{ $id }}"
                                    {{ old('brand_id') == $id ? 'selected' : '' }}
                                >{{ $label }}</option>
                            @endforeach
                        </select>

                        <select class="sortSelect" id="sortSelect_sex" name="gender">
                            @foreach($genders as $key => $label)
                                <option
                                    value="{{ $key }}"
                                    {{ old('gender') == $key ? 'selected' : '' }}
                                >{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="category-right">

                        <div class="quantity_buy">
                            <span>Cena (€):</span>
                            <input type="number" name="price" class="qty-input" step="0.01" min="0"
                                value="{{ old('price', 0) }}" required>
                        </div>
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror


                        <div class="quantity_buy">
                            <span>Veľkosť S:</span>
                            <input type="number" name="qty_s" class="qty-input" min="0"
                                value="{{ old('qty_s', 0) }}" required>
                        </div>
                        @error('qty_s')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <div class="quantity_buy">
                            <span>Veľkosť M:</span>
                            <input type="number" name="qty_m" class="qty-input" min="0"
                                value="{{ old('qty_m', 0) }}" required>
                        </div>
                        @error('qty_m')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <div class="quantity_buy">
                            <span>Veľkosť L:</span>
                            <input type="number" name="qty_l" class="qty-input" min="0"
                                value="{{ old('qty_l', 0) }}" required>
                        </div>
                        @error('qty_l')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <div class="quantity_buy">
                            <span>Veľkosť XL:</span>
                            <input type="number" name="qty_xl" class="qty-input" min="0"
                                value="{{ old('qty_xl', 0) }}" required>
                        </div>
                        @error('qty_xl')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
                <div class="add_product">
                    <button type="submit" class="ADDButton" id="addButton">
                        <img src="{{ asset('ig_icons/icon_add.svg') }}" alt="Add">
                        <span>Pridať produkt</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
