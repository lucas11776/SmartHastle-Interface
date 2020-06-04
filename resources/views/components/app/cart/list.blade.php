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
            @if(count($items) == 0)
                <p class="strong text-info pt-3">
                    <i class="fas fa-info-circle"></i> The are not items in cart.
                </p>
            @endif
            @foreach($items as $item)
                @include('components.app.cart.item', ['item' => $item])
            @endforeach
        </ul>
    </div>
    <!-- Cart Buttons -->
    <div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
        <div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
            <div class="button button_clear trans_200"
                 onclick="event.preventDefault();document.getElementById('clear-cart-form').submit()">
                <form id="clear-cart-form"
                      method="POST"
                      action="{{ url('cart/clear') }}">
                    @csrf
                </form>
                <a class="text-white">Clear</a>
            </div>
            <div class="button button_continue trans_200">
                <a href="{{ url('products') }}">
                    Continue
                </a>
            </div>
        </div>
    </div>
</div>
