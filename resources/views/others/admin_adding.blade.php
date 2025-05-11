

@extends('others.app')


<@push()
    <link rel="stylesheet" href="{{ asset('css/admin_add.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{asset('css/paggination.css')}}">
@endpush>




@section('content')
    <div class="main-container">
      <div class="filter_bar">
          <div class="sort-container">
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

            <button class="sortButton" id="sortButton">Hľadaj</button>
      </div>
      <div class="add_product">
        <button class="ADDButton" id="addButton">
          <img src="ig_icons/icon_add.svg" alt="Add">
          <span>Pridať produkt</span>
        </button>
      </div>
    </div>


    <div class="products_board">
        <div class="product_item">
          <a>
            <img src="item/bike_item.jpg" alt="item">
          </a>
          <div class="caption-container">
            <p class="caption">Horský bicykel 29</p>
          </div>
          <div class="caption-container">
            <p class="caption">250€</p>
          </div>
          <div class="edit-container">
            <button class="button-edit">
              <img src="ig_icons/icon-delete.svg" alt="Delete">
            </button>
            <button class="button-edit">
              <img src="ig_icons/icon-edit.svg" alt="Edit">
            </button>
          </div>
        </div>
        <div class="product_item">
          <a>
            <img src="item/bike_item.jpg" alt="item">
          </a>
          <div class="caption-container">
            <p class="caption">Horský bicykel 29</p>
          </div>
          <div class="caption-container">
            <p class="caption">250€</p>
          </div>
          <div class="edit-container">
            <button class="button-edit">
              <img src="ig_icons/icon-delete.svg" alt="Delete">
            </button>
            <button class="button-edit">
              <img src="ig_icons/icon-edit.svg" alt="Edit">
            </button>
          </div>
        </div>
        <div class="product_item">
          <a>
            <img src="item/bike_item.jpg" alt="item">
          </a>
          <div class="caption-container">
            <p class="caption">Horský bicykel 29</p>
          </div>
          <div class="caption-container">
            <p class="caption">250€</p>
          </div>
          <div class="edit-container">
            <button class="button-edit">
              <img src="ig_icons/icon-delete.svg" alt="Delete">
            </button>
            <button class="button-edit">
              <img src="ig_icons/icon-edit.svg" alt="Edit">
            </button>
          </div>
        </div>
        <div class="product_item">
          <a>
            <img src="item/bike_item.jpg" alt="item">
          </a>
          <div class="caption-container">
            <p class="caption">Horský bicykel 29</p>
          </div>
          <div class="caption-container">
            <p class="caption">250€</p>
          </div>
          <div class="edit-container">
            <button class="button-edit">
              <img src="ig_icons/icon-delete.svg" alt="Delete">
            </button>
            <button class="button-edit">
              <img src="ig_icons/icon-edit.svg" alt="Edit">
            </button>
          </div>
        </div>
        <div class="product_item">
          <a>
            <img src="item/bike_item.jpg" alt="item">
          </a>
          <div class="caption-container">
            <p class="caption">Horský bicykel 29</p>
          </div>
          <div class="caption-container">
            <p class="caption">250€</p>
          </div>
          <div class="edit-container">
            <button class="button-edit">
              <img src="ig_icons/icon-delete.svg" alt="Delete">
            </button>
            <button class="button-edit">
              <img src="ig_icons/icon-edit.svg" alt="Edit">
            </button>
          </div>
        </div>
        <div class="product_item">
          <a>
            <img src="item/bike_item.jpg" alt="item">
          </a>
          <div class="caption-container">
            <p class="caption">Horský bicykel 29</p>
          </div>
          <div class="caption-container">
            <p class="caption">250€</p>
          </div>
          <div class="edit-container">
            <button class="button-edit">
              <img src="ig_icons/icon-delete.svg" alt="Delete">
            </button>
            <button class="button-edit">
              <img src="ig_icons/icon-edit.svg" alt="Edit">
            </button>
          </div>
        </div>
      </div>
      <ul class="pagination">
        <li><a href="#" class="arrow" data-page="prev">&#10094;</a></li>

        <li><a href="#" data-page="1" class="active">1</a></li>
        <li><a href="#" data-page="2">2</a></li>
        <li><a href="#" data-page="3">3</a></li>

        <li><a href="#" class="arrow" data-page="next">&#10095;</a></li>
      </ul>
    </div>
@endsection


