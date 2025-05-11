


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
            <li><a href = "{{ route('products.group', 2) }}" class = "button">Novinky</a></li>
            <li><a href = "{{ route('products.group', 3) }}" class = "button">Akcie</a></li>
            <li><a href="{{ route('products.index', 1) }}" class = "button">Bicykle</a></li>
            <li><a href="{{ route('products.index', 2) }}" class = "button">Lyže</a></li>
        </ul>
    </nav>

    <div class="icons">
        <div class="searching_bar">
            <form method="GET" action="{{ route('products.search') }}">
                <a href="#" class = "icon-find">
                    <img src="{{ asset('images/search.svg')}}" alt="Find">
                </a>
                <input type="text" name="find" class="search-input" placeholder="Hľadať...">
            </form>
        </div>

        <div class="dropdown">
            <a href="account.html" class = "icon-user">
                <img src="{{ asset('images/user.svg')}}" alt="user">
            </a>

            <div id="user-menu" class="dropdown-menu">
                <ul>
                    @auth
                        @if(Auth::user()->is_admin)
                            <li><a href="{{ route('account.edit') }}">Admin účet</a></li>
                            <li><a href="{{ route('admin.show.products') }}">Pridať/editovať produkt</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit">Odhlásenie</button>
                                </form>
                            </li>
                        @else
                            <li><a href="{{ route('account.edit') }}">Moj účet</a></li>
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
        </div>



        <input type="checkbox" id="cartToggle" hidden>

        <div class="trolley-container" style="position: relative;">
            <label for="cartToggle" class="ico-trolley" id="cartIcon" style="cursor: pointer;">
                <img src="{{ asset('images/shopping.svg') }}" alt="shopping cart">
                @if($cartItems->isNotEmpty())
                    <span class="badge">{{ $cartItems->sum('quantity') }}</span>
                @endif
            </label>
        </div>


        <label for="cartToggle" class="overlay"></label>


        <aside class="cart-sidebar">
            <div class="header">
                <h3>Váš košík</h3>
                <label for="cartToggle" class="close-btn">✖</label>
            </div>

            @if($cartItems->isEmpty())
                <p class="empty">V košíku nič nie je.</p>
            @else
                <ul class="cart-list">
                    @foreach($cartItems as $item)
                        <li class="cart-item">
                            <img src="{{ asset($item->product->mainPhoto->image_URL ?? 'images/no-image.jpg') }}" alt="{{ $item->product->title }}" class="thumb">
                            <div class="info">
                                <p class="title">{{ $item->product->title }}</p>
                                <p class="meta">Veľkosť: {{ $item->size }}</p>
                                <form action="{{ route('cart.update') }}" method="POST" class="form-update">
                                    @csrf
                                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                                    <label>Množstvo:
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" style="width: 3rem" onchange="this.form.submit()">
                                    </label>
                                </form>
                                <form action="{{ route('cart.destroy', $item) }}" method="POST" class="form-delete" style="margin-top: .5rem;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-sm">Odstrániť</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="cart-footer">
                    <a href="{{ route('cart.show') }}" class="btn btn-sm">Zobraziť košík</a>
                </div>
            @endif
        </aside>
    </div>
</div>

