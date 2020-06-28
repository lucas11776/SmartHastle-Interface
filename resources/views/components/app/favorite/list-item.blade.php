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
            <div class="product_name">
                <a href="{{ url($item->favoriteable->slug) }}">
                    {{ Str::limit($item->favoriteable->name, 30) }}
                </a>
            </div>
            <div class="product_text">
                {{ Str::limit($item->favoriteable->description, 50) }}
            </div>
        </div>
    </div>
    <div class="product_quantity_container"
         style="min-width: 80px;">
        <div class="btn-group">
            <form action="{{ url('favorite/' . $item->id) }}"
                  method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden"
                       name="id">
                <button class="btn btn-warning"
                         type="submit">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
            <form action="{{ url('favorite/' . $item->id . '/to/cart') }}"
                  method="POST"
                  class="ml-1">
                @csrf
                @method('DELETE')
                <input type="hidden"
                       name="id">
                <button class="btn btn-success"
                        type="submit">
                    <i class="fas fa-cart-plus"></i>
                </button>
            </form>
        </div>
    </div>
    <div class="product_total product_text mr-2">
        <span>Total: </span>R{{ number_format($item->favoriteable->price, 2) }}
    </div>
</li>
