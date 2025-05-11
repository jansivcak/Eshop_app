



<div class="product_item">
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


