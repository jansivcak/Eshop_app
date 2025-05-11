


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
        <div class="add-product-container">
            <div class="image-uploader">
                <div class="thumbnail plus">
                    <span>+</span>
                    <input type="file" class="file-input" style="display: none;">
                </div>
                <div class="thumbnail plus">
                    <span>+</span>
                    <input type="file" class="file-input" style="display: none;">
                </div>
                <div class="thumbnail plus">
                    <span>+</span>
                    <input type="file" class="file-input" style="display: none;">
                </div>
                <div class="thumbnail plus">
                    <span>+</span>
                    <input type="file" class="file-input" style="display: none;">
                </div>
            </div>
            <div class="add-description">
                <div class="description-title">
                    <label for="Title">Názov:</label><br>
                    <textarea class="input" id="Title" name="Title"></textarea>
                </div>

                <div class="description-content">
                    <label for="lil-description">Krátky popis:</label><br>
                    <textarea class="input-lil-description" id="lil-description" name="lil-description" placeholder="Napíš krátky popis"></textarea>
                </div>

                <div class="description-content">
                    <label for="description">Širší popis:</label><br>
                    <textarea class="input-description" id="description" name="description" placeholder="Napíš popis produktu..."></textarea>
                </div>
                <div class="bullet-input-container">
                    <ul id="bulletList">
                    </ul>
                    <button id="addBulletBtn">Pridať odrážku</button>
                </div>
            </div>

            <div class="add-category">
                <div class="category-left">
                    <select class="sortSelect" id="sortSelect_group" name="sortSelect">
                        <option class="option" value="none">Skupina</option>
                        <option class="option" value="news">Novinky</option>
                        <option class="option" value="actions">Akcie</option>
                        <option class="option" value="ordinary">Bežné</option>
                    </select>

                    <select class="sortSelect" id="sortSelect_category" name="sortSelect">
                        <option class="option" value="none">Kategoria</option>
                        <option class="option" value="ski">Lyže</option>
                        <option class="option" value="bike">Bicykle</option>
                    </select>

                    <select class="sortSelect" id="sortSelect_type" name="sortSelect">
                        <option class="option" value="none">Typ</option>
                        <option class="option" value="mountain">Horsky</option>
                        <option class="option" value="highway">Cestny</option>
                        <option class="option" value="children">detsky</option>
                        <option class="option" value="retro">Retro</option>
                    </select>
                    <div class="quantity_buy">
                        <span>Cena: </span>
                        <input type="text" class="qty-input" value="0">
                        <img src="ig_icons/euro-icon.svg" alt="euro-icon" width="24" height="24">
                    </div>
                </div>
                <div class="category-right">
                    <select class="sortSelect" id="sortSelect_brand" name="sortSelect">
                        <option class="option" value="brand">Značka</option>
                        <option class="option" value="ghost">Ghost</option>
                        <option class="option" value="trek">Trek</option>
                        <option class="option" value="specialized">Specialized</option>
                    </select>

                    <select class="sortSelect" id="sortSelect_sex" name="sortSelect">
                        <option class="option" value="sex">pohlavie</option>
                        <option class="option" value="man">Muž</option>
                        <option class="option" value="woman">Žena</option>
                    </select>
                    <select class="sortSelect" id="sortSelect_size" name="sortSelect">
                        <option class="option" value="size">Veľkosť</option>
                        <option class="option" value="size_small">S</option>
                        <option class="option" value="size_medium">M</option>
                        <option class="option" value="size_large">L</option>
                        <option class="option" value="size_extralarge">XL</option>
                    </select>

                    <div class="quantity_buy">
                        <span>Množstvo: </span>
                        <input type="text" class="qty-input" value="1">
                    </div>
                </div>
            </div>
            <div class="add_product">
                <button class="ADDButton" id="addButton">
                    <img src="ig_icons/icon_add.svg" alt="Add">
                    <span>Pridať produkt</span>
                </button>
            </div>
        </div>
    </div>

@endsection
