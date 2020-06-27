<!-- Cart Item -->
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
            <div class="product_name"><a href="product.html">Cool Flufy Clothing without Stripes</a></div>
            <div class="product_text">Second line for additional info</div>
        </div>
    </div>
    <div class="product_color product_text"><span>Color: </span>beige</div>
    <div class="product_size product_text"><span>Size: </span>L</div>
    <div class="product_price product_text"><span>Price: </span>$3.99</div>
    <div class="product_quantity_container">
        <div class="product_quantity ml-lg-auto mr-lg-auto text-center">
            <span class="product_text product_num">1</span>
            <div class="qty_sub qty_button trans_200 text-center"><span>-</span></div>
            <div class="qty_add qty_button trans_200 text-center"><span>+</span></div>
        </div>
    </div>
    <div class="product_total product_text"><span>Total: </span>$3.99</div>
</li>
