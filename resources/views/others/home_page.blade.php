<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sportEquip</title>
    <link rel = "stylesheet" href="{{ asset('css/header.css') }}">
    <link rel = "stylesheet" href="{{asset('css/reklama.css')}}">
    <link rel="stylesheet" href="{{ asset('css/novinky_akcie.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main_image_board.css') }}">
    <link rel="stylesheet" href="{{ asset('css/liked-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product_item.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<header class="main-header">
    <div class="header-logo">
        <a href="home_page.html">
            <img src="images/logo.png" alt="logo">
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
            <li><a href="{{ route('products.index', ['group_id' => 2]) }}" class = "button">Novinky</a></li>
            <li><a href="{{ route('products.index', ['group_id' => 3]) }}" class = "button">Akcie</a></li>
            <li><a href="{{ route('products.index', ['category_id' => 1]) }}" class = "button">Bicykle</a></li>
            <li><a href="{{ route('products.index', ['category_id' => 2]) }}" class = "button">Lyže</a></li>
        </ul>
    </nav>

    <div class="icons">
        <div class="searching_bar">
            <a href="#" class = "icon-find">
                <img src="images\search.svg" alt="Find">
            </a>
            <input type="text" class="search-input" placeholder="Hľadať...">
        </div>
        <a href="account.html" class="icon-user" id="user-icon">
            <img src="images\user.svg" alt="user">
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
                                <a type="submit">Odhlásenie</a>
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
            <img src="images\heart.svg" alt="liked">
        </a>
        <a href="{{ route('cart') }}" class = "ico-trolley">
            <img src="images\shopping.svg" alt="shopping cart">
        </a>
    </div>
</div>
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
    <a href="{{ route('products') }}" class="button_novinky">Novinky</a>
</div>

<div class="novinky">
    <div class="product_item">
        <div class="like-button-container">
            <button onclick="Toggle1(this)" class="like-button" aria-label="Like">
                <i class="fas fa-heart"></i>
            </button>
        </div>
        <a href="{{ route('products') }}" class="product_picture">
            <img src="item/bike_item.jpg" alt="bike">
        </a>
        <div class="product-base-info">
            <span class="caption">Horský bicykel 29</span>
        </div>
        <div class="product-base-info">
            <span class="caption">250€</span>
        </div>
    </div>

    <div class="product_item">
        <div class="like-button-container">
            <button onclick="Toggle1(this)" class="like-button" aria-label="Like">
                <i class="fas fa-heart"></i>
            </button>
        </div>
        <a href="{{ route('products') }}" class="product_picture">
            <img src="item/bike_item.jpg" alt="bike">
        </a>
        <div class="product-base-info">
            <span class="caption">Horský bicykel 29</span>
        </div>
        <div class="product-base-info">
            <span class="caption">250€</span>
        </div>
    </div>

    <div class="product_item">
        <div class="like-button-container">
            <button onclick="Toggle1(this)" class="like-button" aria-label="Like">
                <i class="fas fa-heart"></i>
            </button>
        </div>
        <a href="{{ route('products') }}" class="product_picture">
            <img src="item/bike_item.jpg" alt="bike">
        </a>
        <div class="product-base-info">
            <span class="caption">Horský bicykel 29</span>
        </div>
        <div class="product-base-info">
            <span class="caption">250€</span>
        </div>
    </div>

    <div class="product_item">
        <div class="like-button-container">
            <button onclick="Toggle1(this)" class="like-button" aria-label="Like">
                <i class="fas fa-heart"></i>
            </button>
        </div>
        <a href="{{ route('products') }}" class="product_picture">
            <img src="item/bike_item.jpg" alt="bike">
        </a>
        <div class="product-base-info">
            <span class="caption">Horský bicykel 29</span>
        </div>
        <div class="product-base-info">
            <span class="caption">250€</span>
        </div>
    </div>
</div>

<div class="button_novinky_akcia">
    <a href="{{ route('products') }}" class="button_novinky">Akcie</a>
</div>


<div class="novinky">
    <div class="product_item">
        <div class="like-button-container">
            <button onclick="Toggle1(this)" class="like-button" aria-label="Like">
                <i class="fas fa-heart"></i>
            </button>
        </div>
        <a href="{{ route('products') }}" class="product_picture">
            <img src="item/bike_item.jpg" alt="bike">
        </a>
        <div class="product-base-info">
            <span class="caption">Horský bicykel 29</span>
        </div>
        <div class="product-base-info">
            <span class="caption">250€</span>
        </div>
    </div>

    <div class="product_item">
        <div class="like-button-container">
            <button onclick="Toggle1(this)" class="like-button" aria-label="Like">
                <i class="fas fa-heart"></i>
            </button>
        </div>
        <a href="{{ route('products') }}" class="product_picture">
            <img src="item/bike_item.jpg" alt="bike">
        </a>
        <div class="product-base-info">
            <span class="caption">Horský bicykel 29</span>
        </div>
        <div class="product-base-info">
            <span class="caption">250€</span>
        </div>
    </div>

    <div class="product_item">
        <div class="like-button-container">
            <button onclick="Toggle1(this)" class="like-button" aria-label="Like">
                <i class="fas fa-heart"></i>
            </button>
        </div>
        <a href="{{ route('products') }}" class="product_picture">
            <img src="item/bike_item.jpg" alt="bike">
        </a>
        <div class="product-base-info">
            <span class="caption">Horský bicykel 29</span>
        </div>
        <div class="product-base-info">
            <span class="caption">250€</span>
        </div>
    </div>

    <div class="product_item">
        <div class="like-button-container">
            <button onclick="Toggle1(this)" class="like-button" aria-label="Like">
                <i class="fas fa-heart"></i>
            </button>
        </div>
        <a href="{{ route('products') }}" class="product_picture">
            <img src="item/bike_item.jpg" alt="bike">
        </a>
        <div class="product-base-info">
            <span class="caption">Horský bicykel 29</span>
        </div>
        <div class="product-base-info">
            <span class="caption">250€</span>
        </div>
    </div>
</div>
<footer class="site-footer">
    <div class="left-one">
        <div class="left-top">
            <p class="fresh">Buď Fresh</p>
            <div class="ig-photos">
                <img src="ig_icons\Facebook.svg" alt="fresh">
                <img src="ig_icons\Instagram.svg" alt="fresh">
                <img src="ig_icons\Youtube.svg" alt="fresh">
            </div>
        </div>
        <div class="left-bottom">
            <p class="fresh">Akceptujeme</p>
            <div class="ig-photos">
                <img src="ig_icons\googlepay.svg" alt="fresh">
                <img src="ig_icons\applepay.svg" alt="fresh">
                <img src="ig_icons\visa.svg" alt="fresh">
                <img src="ig_icons\pay.svg" alt="fresh">
            </div>
        </div>
    </div>
    <div class="right-one">
        <p class="contact_us">Kontaktujte nás</p>
        <div class="contacts">
            <img src="ig_icons\email.svg" alt="fresh">
            <div>
                <p>Email:</p>
                <p>eshop@sportEquip.sk</p>
            </div>
        </div>
        <div class="contacts">
            <img src="ig_icons\phone.svg" alt="fresh">
            <div>
                <p>Telefón</p>
                <p>+421958792655</p>
            </div>
        </div>
        <div class="contacts">
            <img src="ig_icons\point.svg" alt="fresh">
            <div>
                <p>Vajnorská 5</p>
                <p>Bratislava</p>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('script/script_home.js') }}"></script>
<script src="{{ asset('script/liked.js') }}"></script>
</body>
</html>

