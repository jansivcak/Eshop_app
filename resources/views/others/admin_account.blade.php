<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin_account') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
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
            <li><a href = "products.html" class = "button">Novinky</a></li>
            <li><a href = "products.html" class = "button">Akcie</a></li>
            <li><a href = "products.html" class = "button">Bicykle</a></li>
            <li><a href = "products.html" class = "button">Lyže</a></li>
        </ul>
    </nav>

    <div class="icons">
        <div class="searching_bar">
            <a href="#" class = "icon-find">
                <img src="images\search.svg" alt="Find">
            </a>
            <input type="text" class="search-input" placeholder="Hľadať...">
        </div>
        <a href="admin_account.html" class = "icon-user">
            <img src="images\user.svg" alt="user">
        </a>
        <a href="liked.html" class = "icon-liked">
            <img src="images\heart.svg" alt="liked">
        </a>
        <a href="cart.html" class = "ico-trolley">
            <img src="images\shopping.svg" alt="shopping cart">
        </a>
    </div>
</div>




<div class="main-container-admin-account">
    <div class="admin-account">
        <div class="title">
            <p>Administrator</p>
        </div>
        <div class="content">
            <div class="row">
                <p>Meno:</p>
                <div class="field-information">
                    <p>Ján</p>
                </div>
            </div>
            <div class="row">
                <p>Priezvisko:</p>
                <div class="field-information">
                    <p>Novák</p>
                </div>
            </div>
            <div class="row">
                <p>Email:</p>
                <div class="field-information">
                    <p>jan.novak@gmail.com</p>
                </div>
            </div>
            <div class="row">
                <p>Telefón:</p>
                <div class="field-information">
                    <p>+421 951 854 963</p>
                </div>
            </div>
            <div class="row">
                <p>Staré heslo:</p>
                <input class="password" type="password" placeholder="Zadajte staré heslo">
            </div>
            <div class="row">
                <p>Nové heslo:</p>
                <input class="password" type="password" placeholder="Zadajte nové heslo">
            </div>
        </div>
        <button class="save-button">Uložiť</button>
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


</body>
</html>
