

@section('content')
    <section class="cart-container">
        <h1>Košík</h1>
        <div class="cart-steps">
            <button class="active">Košík</button>
            <button onclick="location.href='payment.html'">Doprava a platba</button>
            <button onclick="location.href='checkout.html'">Dodacie údaje</button>
        </div>

        <div class="cart-content">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Produkt</th>
                        <th>Cena</th>
                        <th>Množstvo</th>
                        <th>Medzisúčet</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="images/bike.png" alt="Bicykel"></td>
                        <td>150.00 €</td>
                        <td><input type="number" value="1" min="1"></td>
                        <td>150.00 €</td>
                    </tr>
                </tbody>
            </table>

            <div class="cart-summary">
                <h2>Cart Totals</h2>
                <p><strong>Total:</strong> <span class="total-price">150.00 €</span></p>
                <a href="payment.html" class = "icon-liked">
                    <button class="checkout-btn">Pokračovať</button>
                    <a>
                <a href="home_page.html" class = "icon-liked">
                    <button class="back-btn">Späť do obchodu</button>
                    <a>

            </div>
        </div>
    </section>
@endsection()
