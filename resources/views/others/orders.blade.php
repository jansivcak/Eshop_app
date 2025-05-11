<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>História objednávok</title>
    <link rel="stylesheet" href="{{asset('css/orders.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
</head>
<body>
    <header class="main-header">
        <div class="logo">
            <a href="home_page.html">
                <img src="images\logo.png" alt="sportEquip">
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
                <li><a href = "products.html" class = "button">Bicykle</a></li>
                <li><a href = "products.html" class = "button">Kolobežky</a></li>
                <li><a href = "products.html" class = "button">Lyže</a></li>
                <li><a href = "products.html" class = "button">Korčule</a></li>
            </ul>
        </nav>

        <div class="icons">
            <div class="searching_bar">
                <a href="#" class = "icon-find">
                    <img src="images\search.svg" alt="Find">
                </a>
                <input type="text" class="search-input" placeholder="Hľadať...">
            </div>
            <a href="#" class="icon-user" id="user-icon">
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
                <img src="images\heart.svg" alt="liked">
            </a>
            <a href="cart.html" class = "ico-trolley">
                <img src="images\shopping.svg" alt="shopping cart">
            </a>
        </div>
    </div>

    <main class="orders-container">
        <h1>História objednávok</h1>
        <table class="orders-table">
            <thead>
                <tr>
                    <th>Číslo objednávky</th>
                    <th>Dátum</th>
                    <th>Faktúra</th>
                    <th>Celková cena</th>
                </tr>
            </thead>
            <tbody id="orders-list">

            </tbody>
        </table>
    </main>
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

</body>
</html>
