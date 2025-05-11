



<div class="product_item">
    <a>
        <img src="{{ asset($product->mainPhoto->image_URL) }}" alt="{{ $product->title }}">
    </a>
    <div class="caption-container">
        <span class="caption">{{ $product->title }}</span>
    </div>
    <div class="caption-container">
        <span class="caption">{{ $product->price }} €</span>
    </div>
    <div class="edit-container">
        <button class="button-edit">
            <img src="{{ asset('ig_icons/icon-delete.svg') }}" alt="Delete">
        </button>
        <button class="button-edit">
            <img src="{{ asset('ig_icons/icon-edit.svg') }}" alt="Edit">
        </button>
    </div>
</div>


