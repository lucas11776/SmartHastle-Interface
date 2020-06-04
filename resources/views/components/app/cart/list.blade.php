<div class="cart_container">
    <div class="cart_bar">
        <ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-end">
            <li class="mr-auto">
                <i class="fas fa-shopping-cart"></i> Items
            </li>
            <li>Size</li>
            <li>Price</li>
            <li class="text-center"
                style="width: 150px;">
                Select Size</li>
            <li class="text-center"
                style="width: 120px;">Action</li>
        </ul>
    </div>
    <!-- Cart Items -->
    <div class="cart_items">
        <ul class="cart_items_list">
            @foreach($items as $item)
                @include('components.app.cart.item', ['item' => $item])
            @endforeach
        </ul>
    </div>
    <!-- Cart Buttons -->
    <div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
        <div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
            <div class="button button_clear trans_200">
                <a href="categories.html">
                    clear
                </a>
            </div>
            <div class="button button_continue trans_200">
                <a href="{{ url('products') }}">
                    Continue
                </a>
            </div>
        </div>
    </div>
</div>
