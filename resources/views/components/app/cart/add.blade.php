<div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
    <div onclick="event.preventDefault();document.getElementById('add-cart-form-{{ $item->id }}').submit();">
        <div>
            <form id="add-cart-form-{{ $item->id }}"
                  method="POST"
                  action="{{ url('cart') }}">
                @csrf
                <input type="hidden"
                       name="cartable_id"
                       value="{{ $item->id }}">
                <input type="hidden"
                       name="cartable_type"
                       value="{{ get_class($item) }}">
                <input type="hidden"
                       id="cart-form-{{ $item->id }}-size"
                       name="size">
                <img src="assets/app/images/cart.svg"
                     class="svg"
                     alt="Add to cart.">
                <div>+</div>
            </form>
        </div>
    </div>
</div>
