<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{asset('css/main_product_page.css')}}">
    <link rel="stylesheet" href="{{asset('css/paggination.css')}}">
    <link rel="stylesheet" href="{{asset('css/product_item.css')}}">
    <link rel="stylesheet" href="{{asset('css/input_price.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<header class="main-header">
  <div class="header-logo">
    <a href="{{ route('home') }}">
      <img src="{{ asset('images/logo.png')}}" alt="logo">
    </a>
  </div>
</header>
<div class="header-container">

  <div class="hamburger">
    <span></span>
    <span></span>
    <span></span>
  </div>

  <nav class = "categories">
    <ul>
      <li><a href = "products.html" class = "button">Novinky</a></li>
      <li><a href = "products.html" class = "button">Akcie</a></li>
      <li><a href="{{ route('products.index', 1) }}" class = "button">Bicykle</a></li>
      <li><a href="{{ route('products.index', 2) }}" class = "button">Lyže</a></li>
    </ul>
  </nav>

  <div class="icons">
    <div class="searching_bar">
      <a href="#" class = "icon-find">
        <img src="{{ asset('images/search.svg')}}" alt="Find">
      </a>
      <input type="text" class="search-input" placeholder="Hľadať...">
    </div>
    <a href="account.html" class = "icon-user">
      <img src="{{ asset('images/user.svg')}}" alt="user">
    </a>

      <div id="user-menu" class="user-menu">
          <ul>
              @auth
                  @if(Auth::user()->is_admin)
                      <li><a href="{{ route('account') }}">Admin účet</a></li>
                      <li><a href="{{ route('edditing') }}">Pridať/editovať produkt</a></li>
                      <li>
                          <form method="POST" action="{{ route('logout') }}">
                              @csrf
                              <button type="submit">Odhlásenie</button>
                          </form>
                      </li>
                  @else
                      <li><a href="{{ route('account') }}">Moj účet</a></li>
                      <li><a href="{{ route('orders') }}">Objednávky</a></li>
                      <li>
                          <form method="POST" action="{{ route('logout') }}">
                              @csrf
                              <button type="submit">Odhlásenie</button>
                          </form>
                      </li>
                  @endif
              @endauth

              @guest
                      <li><a href="{{ route('login') }}">Prihlásiť</a></li>
                      <li><a href="{{ route('register') }}">Registrovať</a></li>
              @endguest
          </ul>
      </div>

    <a href="liked.html" class = "icon-liked">
      <img src="{{ asset('images/heart.svg')}}" alt="liked">
    </a>
    <a href="cart.html" class = "ico-trolley">
      <img src="{{ asset('images/shopping.svg')}}" alt="shopping cart">
    </a>
  </div>
</div>


<div class="main-container">
    <div class="filter">
        <form method="GET" action="{{ route('products.index', $category_id) }}">
            {{-- TYPY --}}
            <p class="nadpis">Typ</p>
            <div class="categories">
                @foreach($types as $type)
                    <div class="filter-item">
                        <label class="container">
                            <input
                                type="checkbox"
                                name="types[]"
                                value="{{ $type->id }}"
                                {{ in_array($type->id, request('types', [])) ? 'checked' : '' }}
                            >
                            <span class="checkmark"></span>
                            <span class="label-text">{{ $type->name }}</span>
                        </label>
                    </div>
                @endforeach
            </div>

            {{-- ZNAČKY --}}
            <p class="nadpis">Značka</p>
            <div class="categories">
                @foreach($brands as $brand)
                    <div class="filter-item">
                        <label class="container">
                            <input
                                type="checkbox"
                                name="brands[]"
                                value="{{ $brand->id }}"
                                {{ in_array($brand->id, request('brands', [])) ? 'checked' : '' }}
                            >
                            <span class="checkmark"></span>
                            <span class="label-text">{{ $brand->name }}</span>
                        </label>
                    </div>
                @endforeach
            </div>

            {{-- SPOLOČNÉ FILTRE (napr. pohlavie) --}}
            <p class="nadpis">Pohlavie</p>
            <div class="categories">
                @foreach(['muž','žena'] as $g)
                    <div class="filter-item">
                        <label class="container">
                            <input type="checkbox" name="gender[]" value="{{ $g }}" {{ in_array($g, request('gender', [])) ? 'checked' : '' }}>
                            <span class="checkmark"></span>
                            <span class="label-text">{{ ucfirst($g) }}</span>
                        </label>
                    </div>
                @endforeach
            </div>

            <p class="nadpis">Cena</p>
            <div class="categories">
                <div class="filter-item">
                    <span>Cena od:</span>
                    <input class="input_price" type="number" name="price_min" step="0.01" value="{{ request('price_min', '') }}"><br>
                    <span>Cena do:</span>
                    <input class="input_price" type="number" name="price_max" step="0.01" value="{{ request('price_max', '') }}"><br>
                </div>
            </div>

            <p class="nadpis">Zoradiť</p>
            <select class="sortSelect" id="sortSelect" name="sortSelect">
                <option value="none" {{ $sortSelect === null || $sortSelect === 'none' ? 'selected' : '' }}>Vyber...</option>
                <option value="price_asc" {{ $sortSelect === 'price_asc' ? 'selected' : '' }}>Cena (od najnižšej)</option>
                <option value="price_desc" {{ $sortSelect === 'price_desc' ? 'selected' : '' }}>Cena (od najvyššej)</option>
            </select>


            <div class="filter-submit">
                <button type="submit" class="filter_button">Filtrovať</button>
            </div>

        </form>
    </div>
    <div class="products">
          <div class="products_board">
              @foreach ($products as $product)
                  <div class="product_item">
                      <div class="like-button-container">
                          <button onclick="Toggle1(this)" class="like-button" aria-label="Like">
                              <i class="fas fa-heart"></i>
                          </button>
                      </div>
                      <a href="{{route('products.show', $product->id)}}" class="product_picture">
                          <img src="{{ asset($product->mainPhoto->image_URL) }}" alt="{{ $product->title }}">
                      </a>
                      <div class="product-base-info">
                          <span class="caption">{{ $product->title }}</span>
                      </div>
                      <div class="product-base-info">
                          <span class="caption">{{ $product->price }} €</span>
                      </div>
                  </div>
              @endforeach
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


<footer class="site-footer">
  <div class="left-one">
    <div class="left-top">
      <p class="fresh">Buď Fresh</p>
      <div class="ig-photos">
        <img src="{{ asset('ig_icons/Facebook.svg') }}" alt="fresh">
        <img src="{{ asset('ig_icons/Instagram.svg')}}" alt="fresh">
        <img src="{{ asset('ig_icons/Youtube.svg')}}" alt="fresh">
      </div>
    </div>
    <div class="left-bottom">
      <p class="fresh">Akceptujeme</p>
      <div class="ig-photos">
        <img src="{{ asset('ig_icons/googlepay.svg')}}" alt="fresh">
        <img src="{{ asset('ig_icons/applepay.svg')}}" alt="fresh">
        <img src="{{ asset('ig_icons/visa.svg')}}" alt="fresh">
        <img src="{{ asset('ig_icons/pay.svg')}}" alt="fresh">
      </div>
    </div>
  </div>
  <div class="right-one">
    <p class="contact_us">Kontaktujte nás</p>
    <div class="contacts">
      <img src="{{ asset('ig_icons/email.svg')}}" alt="fresh">
      <div>
        <p>Email:</p>
        <p>eshop@sportEquip.sk</p>
      </div>
    </div>
    <div class="contacts">
      <img src="{{ asset('ig_icons/phone.svg')}}" alt="fresh">
      <div>
        <p>Telefón</p>
        <p>+421958792655</p>
      </div>
    </div>
    <div class="contacts">
      <img src="{{ asset('ig_icons/point.svg')}}" alt="fresh">
      <div>
        <p>Vajnorská 5</p>
        <p>Bratislava</p>
      </div>
    </div>
  </div>
</footer>

<script src="{{asset('script/script_home.js')}}"></script>
<script src="{{asset('script/paggination')}}"></script>
<script src="{{asset('script/liked.js')}}"></script>
<script src="{{asset('script/checkboxes.js')}}"></script>

</body>
</html>
