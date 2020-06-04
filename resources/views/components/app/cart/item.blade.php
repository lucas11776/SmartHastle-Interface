<li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
    <div class="d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
        <div>
            <div class="product_number">
                {{ $item->cartable->id }}
            </div>
        </div>
        <div>
            <div class="product_image">
                <img class="img-thumbnail border-primary"
                     src="{{ $item->cartable->image->url }}"
                     alt="{{ $item->cartable->name }}"
                     style="width: 100%; height: 75px; border-radius: 100%;">
            </div>
        </div>
        <div class="product_name_container">
            <div class="product_name">
                <a href="{{ url($item->cartable->slug) }}">
                    {{ $item->cartable->name }}
                </a>
            </div>
            <div class="product_text">
                {{ is_null($item->cartable->description) ? '' : Str::limit($item->cartable->description, 40)  }}
            </div>
        </div>
    </div>
    <div class="product_size product_text">
        <span>Size: </span> {{ $item->size ? $item->size : 'Select Size' }}
    </div>
    <div class="product_price product_text">
        <span>Price: </span>R{{ number_format($item->cartable->price, 2) }}
    </div>
    <div class="product_quantity_container"
         style="width: 150px;">
        <form action=""
              method="post">
            <select class="form-control">
                <option value="">Select Size</option>
            </select>
        </form>
    </div>
    <div class="product_total product_text"
        style="width: 120px;">
        <div class="btn-group"
             role="group"
             aria-label="Basic example">
            <button type="button"
                    class="btn btn-outline-danger"
                    onclick="event.preventDefault();document.getElementById('delete-cart-item-{{ $item->id }}').submit()">
                <i class="fas fa-trash-alt"></i>
            </button>
            <button type="button"
                    class="btn btn-outline-success">
                <i class="fas fa-edit"></i>
            </button>
        </div>
        <form id="delete-cart-item-{{ $item->id }}"
              action="{{ url('cart') }}"
              method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden"
                   name="id"
                   value="{{ $item->id }}">
        </form>
    </div>
</li>
