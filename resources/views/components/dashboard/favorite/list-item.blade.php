<li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
    <div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
        <div>
            <div class="product_number">
                {{ $item->id }}
            </div>
        </div>
        <div>
            <div class="product_image">
                <img src="{{ $item->favoriteable->image->url }}"
                     alt="{{ $item->favoriteable->name }}"
                     style="width: 75px; height: 75px; border-radius: 100%;"
                     class="img-thumbnail border-primary">
            </div>
        </div>
        <div class="product_name_container">
            <div class="product_name">
                <a href="product.html">
                    {{ Str::limit($item->favoriteable->name, 30) }}
                </a>
            </div>
            <div class="product_text">
                {{ Str::limit($item->favoriteable->description, 75) }}
            </div>
        </div>
    </div>
    <div class="product_total product_text">
        <span>Total: </span>R{{ $item->favoriteable->price }}
    </div>
</li>
