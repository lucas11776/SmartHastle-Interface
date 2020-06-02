<div class="product">
    <div class="product_image">
        <img src="{{ $product->image->url }}"
             alt="{{ $product->name }}"
             style="width: 100%; height: 300px">
    </div>
    <div class="product_content">
        <div class="product_info d-flex flex-row align-items-start justify-content-start">
            <div>
                <div>
                    <div class="product_name">
                        <a href="{{ url($product->slug) }}">
                            {{ $product->name }}
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
                <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                    <div>
                        <div>
                            <img src="assets/app/images/heart_2.svg"
                                 class="svg"
                                 alt="">
                            <div>+</div>
                        </div>
                    </div>
                </div>
                @include('components.app.cart.add', ['item' => $product])
            </div>
        </div>
    </div>
</div>
