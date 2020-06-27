<div class="row">
    <div class="col">
        <div class="cart_container">
            <div class="cart_bar">
                <ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-end">
                    <li class="mr-auto">Favorites</li>
                    <li>Color</li>
                    <li>Size</li>
                    <li>Price</li>
                    <li>Quantity</li>
                    <li>Total</li>
                </ul>
            </div>
            <div class="cart_items">
                <ul class="cart_items_list">
                    @foreach($favorites as $item)
                        @include('components.app.favorite.list-item', ['item' => $item])
                    @endforeach
                </ul>
            </div>
            <!-- Cart Buttons -->
            <div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
                <div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
                    <div class="button button_clear trans_200">
                        <a href="categories.html">Clear</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

