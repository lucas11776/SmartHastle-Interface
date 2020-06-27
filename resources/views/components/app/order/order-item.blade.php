<li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
    <div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
        <div>
            <div class="product_number">
                {{ $item->id }}
            </div>
        </div>
        <div>
            <div class="product_image">
                <img class="img-thumbnail border-primary"
                     src="{{ $item->product->image->url }}"
                     alt="{{ $item->product->name }}"
                     style="width: 75px; height: 75px; cursor: pointer;"
                     onclick="event.preventDefault();location.href='{{ $item->product->slug }}'">
            </div>
        </div>
        <div class="product_name_container">
            <div class="product_name">
                <a href="{{ url($item->product->slug) }}">
                    {{ Str::limit($item->product->name, 30) }}
                </a>
            </div>
            <div class="product_text">
                {{ Str::limit($item->product->description, 40) }}
            </div>
        </div>
    </div>
    <div class="product_size product_text">
        <span>Size: </span>{{ strtoupper($item->size) }}
    </div>
    <div class="product_price product_text">
        <span>Price: </span>R{{ number_format($item->product->price, 2) }}
    </div>
    @if($order->status == 'waiting')
        <div class="product_quantity_container">
            <div class="btn-group dropleft">
                <button type="button"
                        class="btn btn-link dropdown-toggle"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                    <i class="fas fa-tshirt"></i>
                </button>
                <div class="dropdown-menu p-0 m-0">
                    <div class="btn-group">
                        @foreach(\App\Product::$sizes as $size)
                            @if($size != $item->size)
                                <form action="{{ url('order/' . $order->id . '/item/' . $item->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden"
                                           name="size"
                                           value="{{ $size }}">
                                    <button class="btn btn-primary border-white"
                                            type="submit">
                                        {{ $size }}
                                    </button>
                                </form>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
</li>
