<div class="row">
    <div class="col">
        <div class="cart_container">
            <!-- Cart Bar -->
            <div class="cart_bar">
                <ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-end">
                    <li class="mr-auto">Favorite Items</li>
                    <li>Price</li>
                </ul>
            </div>
            <!-- Cart Items -->
            <div class="cart_items">
                <ul class="cart_items_list">
                    @foreach($favorites as $item)
                        @include('components.dashboard.favorite.list-item', ['item' => $item])
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
