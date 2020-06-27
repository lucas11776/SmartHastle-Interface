<div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
    <div onclick="event.preventDefault();document.getElementById('add-favorite-form-{{ $item->id }}').submit();">
        <div>
            <form id="add-favorite-form-{{ $item->id }}"
                  method="POST"
                  action="{{ url('favorite') }}">
                @csrf
                <input type="hidden"
                       name="favoriteable_id"
                       value="{{ $item->id }}">
                <input type="hidden"
                       name="favoriteable_type"
                       value="{{ get_class($item) }}">
                <input type="hidden"
                       id="cart-form-{{ $item->id }}-size"
                       name="size">
                <img src="{{ url('assets/app/images/heart_2.svg') }}"
                     class="svg"
                     alt="Add to cart.">
                <div>+</div>
            </form>
        </div>
    </div>
</div>
