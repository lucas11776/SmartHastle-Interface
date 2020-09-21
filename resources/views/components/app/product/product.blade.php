<div class="product">
    <div class="product_image">
        <a href="{{ url($product->slug) }}">
            <img src="{{ $product->image->url }}"
                 alt="{{ $product->name }}"
                 style="width: 100%; height: 300px">
        </a>
    </div>
    <div class="product_content">
        <div class="product_info d-flex flex-row align-items-start justify-content-start">
            <div>
                <div>
                    <div class="product_name">
                        <a href="{{ url($product->slug) }}" title="{{ $product->name }}">
                            <small class="font-weight-bolder">
                                {{ Str::limit($product->name, 20) }}
                            </small>
                        </a>
                    </div>
                    <div class="product_category">
                        {{ $product->category->name }}
                    </div>
                </div>
            </div>
            <div class="ml-auto text-right">
                <div class="product_price text-right">
                    R{{ (int)$product->price }}<span>.{{ $product::decimal($product->price) }}</span>
                </div>
            </div>
        </div>
        <div class="product_buttons">
            <div class="text-right d-flex flex-row align-items-start justify-content-start">
                @include('components.app.favorite.add', ['item' => $product])
                @include('components.app.cart.add', ['item' => $product])
            </div>
        </div>
    </div>
</div>
