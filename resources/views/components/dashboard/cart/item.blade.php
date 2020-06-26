<li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
    <div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
        <div>
            <div class="product_number">
                {{ $item->id }}
            </div>
        </div>
        <div>
            <div class="product_image">
                <img src="{{ url($item->cartable->image->url) }}"
                     alt="{{ $item->cartable->name }}">
            </div>
        </div>
        <div class="product_name_container">
            <div class="product_name">
                <a href="{{ url($item->cartable->slug) }}">
                    {{ Str::limit($item->cartable->name, 30) }}
                </a>
            </div>
            <div class="product_text">
                {{ Str::limit($item->cartable->description, 75) }}
            </div>
        </div>
    </div>
    <div class="product_size product_text">
        <span>Size: </span>{{ $item->size ?? '--' }}
    </div>
    <div class="product_price product_text">
        <span>Price: </span>R{{ number_format($item->cartable->price, 2) }}
    </div>
</li>
