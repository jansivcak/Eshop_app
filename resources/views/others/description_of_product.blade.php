<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
    <link rel="stylesheet" href="{{asset('css/Produktdescription.css')}}">
    <link rel = "stylesheet" href = "{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel = "stylesheet" href = "{{asset('css/product_item.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<header class="main-header">
    <div class="header-logo">
        <a href="home_page.html">
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
            <li><a href = "products.html" class = "button">Bicykle</a></li>
            <li><a href = "products.html" class = "button">Lyže</a></li>
        </ul>
    </nav>

    <div class="icons">
        <div class="searching_bar">
            <a href="#" class = "icon-find">
                <img src="{{ asset('images\search.svg') }}" alt="Find">
            </a>
            <input type="text" class="search-input" placeholder="Hľadať...">
        </div>
        <a href="account.html" class = "icon-user">
            <img src="{{ asset('images\user.svg') }}" alt="user">
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
            <img src="{{ asset('images\heart.svg') }}" alt="liked">
        </a>
        <a href="cart.html" class = "ico-trolley">
            <img src="{{ asset('images\shopping.svg') }}" alt="shopping cart">
        </a>
    </div>
</div>


<div class="main_container">
    <div class="product">
        <div class="gallery">
            <div class="main-board">
                <img src="item/bike_item.jpg" alt="Hlavný obrázok" id="mainImage" class="main-image">
            </div>
            <div class="thumbnails">
                <img src="item/bike_item.jpg" alt="Náhľad 1" class="thumbnail">
                <img src="item/bike_item.jpg" alt="Náhľad 2" class="thumbnail">
                <img src="images/bicycle.jpg" alt="Náhľad 3" class="thumbnail">
            </div>
        </div>
        <div class="lil_description">
            <h3>Bicykel Horský Ghost 29</h3>
            <div class="short_description">
                <p>Émonda ALR 5 Disc je veľmi ľahký a citlivý zliatinový pretekársky bicykel. Jeho prepracované tvary
                    zliatinových rúrok Kammtail a pretekárska geometria H1.5 mu dodávajú elegantný vzhľad a ovládateľnosť karbónového bicykla, avšak v cenovej kategórii zliatinových bicyklov.</p>
            </div>
            <div class="year_model">
                <p class="short_description_special">Rok výroby:</p>
                <p class="short_description_year">2025</p>
            </div>
            <p class="short_description">Veľkosť:</p>
            <div class="size">
                <div class="size-options">
                    <div class="size-option">S</div>
                    <div class="size-option active">M</div>
                    <div class="size-option">L</div>
                    <div class="size-option">XL</div>
                </div>
            </div>
            <div class="store">
                <p class="dostupnost">Dostupnost:</p>
                <p class="is_dostupnost">Skladom</p>
            </div>
            <div class="price">
                <p class="short_description">Cena:</p>
                <p class="short_description_price">1500,00 €</p>
            </div>
            <div class="quantity_buy">
                <div class="quantity-selector">
                    <button class="qty-btn minus">-</button>
                    <input type="text" class="qty-input" value="1">
                    <button class="qty-btn plus">+</button>
                </div>
                <button class="add-to-cart">Vložiť do košíka</button>
            </div>

        </div>
    </div>
    <div class="description_container">
        <h3 class="popis">Popis</h3>
        <div class="description">
            <p>
                Hľadáte všetky výhody bicykla, ktorý je skonštruovaný na výkon s nízkou hmotnosťou, v cenovo dostupnom zliatinovom ráme, ktorý má elegantný vzhľad a ovládateľnosť, akú by ste očakávali len od karbónového rámu, a istý brzdný účinok, ktorý poskytujú kotúčové brzdy.
                Bicykel ponúka dokonalú kombináciu ľahkosti a odolnosti, čo zaručuje maximálny výkon aj na náročnom teréne. Jeho elegantný dizajn a inovatívne technológie robia z každej jazdy zážitok plný komfortu a štýlu.
            </p>
            <br>
            <ul class="description-list">
                <li>Tento ultraľahký zliatinový rám je navrhnutý na preteky a má veľmi prehľadné vedenie káblov.</li>
                <li>Rýchly pri stúpaniach, stabilný v zákrutách a istý pri zjazdoch.</li>
                <li>Tvary trubiek Kammtail pomáhajú modelu Émonda ALR jazdiť ešte rýchlejšie ako predtým.</li>
                <li>Má rovnakú geometriu ako naše špičkové karbónové pretekárske bicykle Émonda a poskytuje jazdnú kvalitu, ktorá sa v každom ohľade vyrovná oveľa drahším karbónovým bicyklom.</li>
                <li>Vnútorné vedenie predlžuje životnosť káblov a dodáva bicyklu elegantný vzhľad.</li>
            </ul>
        </div>
    </div>

    <h3 class="zaujimat">Mohlo by vás zaujímať</h3>

    <div class="button_novinky_akcia">
        <a href="products.html" class="button_novinky">Naše novinky</a>
    </div>

    <div class="novinky">
        <div class="product_item">
            <div class="like-button-container">
                <button onclick="Toggle1(this)" class="like-button" aria-label="Like">
                    <i class="fas fa-heart"></i>
                </button>
            </div>
            <a href="description_of_product.html" class="product_picture">
                <img src="{{ asset('item/bike_item.jpg') }}" alt="bike">
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
            <a href="description_of_product.html" class="product_picture">
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
            <a href="description_of_product.html" class="product_picture">
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
            <a href="description_of_product.html" class="product_picture">
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

</div>





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

<script src="{{assert('script/script_home.js')}}"></script>
<script src="{{asset('script/liked.js')}}"></script>

</body>
</html>
