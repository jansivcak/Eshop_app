




@section('content')
    <main>
        <h1>Doprava a platba</h1>
        <div class="cart-steps">
            <button onclick="location.href='cart.html'">Košík</button>
            <button class="active">Doprava a platba</button>
            <button onclick="location.href='checkout.html'">Dodacie údaje</button>
        </div>
        <section>
            <h2>Zvoľte spôsob doručenia</h2>
            <div class="option-group">
                <label><input type="radio" name="shipping" value="predajna"> Predajňa</label>
                <label><input type="radio" name="shipping" value="kurier_post"> Kuriérom na poštu</label>
                <label><input type="radio" name="shipping" value="kurier_adresa"> Kuriérom na adresu</label>
                <label><input type="radio" name="shipping" value="balikobox"> Kuriérom do Balikoboxu</label>
            </div>
        </section>
        <section>
            <h2>Zvoľte spôsob platby</h2>
            <div class="option-group">
                <label><input type="radio" name="payment" value="card"> Platba kartou</label>
                <label><input type="radio" name="payment" value="gpay"> Google Pay</label>
                <label><input type="radio" name="payment" value="paypal"> Paypal</label>
                <label><input type="radio" name="payment" value="cash"> Dobierkou</label>
            </div>

            <div id="card-fields" style="display:none; margin-top: 1rem;">
                <h3>Údaje o karte</h3>
                <label>Číslo karty:
                    <input type="text" name="card_number" maxlength="16">
                </label>
                <label>Platnosť:
                    <input type="text" name="card_expiry" placeholder="MM/RR">
                </label>
                <label>CVV:
                    <input type="text" name="card_cvv" maxlength="4">
                </label>
            </div>
            
        </section>
        <div class="cart-summary">
            <h2>Cart Totals</h2>
            <p>Platba: <span>1.00 €</span></p>
            <p>Doprava: <span>3.50 €</span></p>
            <p>Total: <span>104.50 €</span></p>
            <a href="checkout.html" class = "icon-liked">
                <button class="btn btn-continue">Pokračovať</button>
                </a>
            <a href="cart.html" class = "icon-liked">
                <button class="btn btn-back">Späť do obchodu</button>
                </a>

        </div>
    </main>
@endsection
