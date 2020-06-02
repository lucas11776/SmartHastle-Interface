@inject('products', App\Product)

<div class="home">
    <!-- Home Slider -->
    <div class="home_slider_container">
        <div class="owl-carousel owl-theme home_slider">
            <!-- Slide -->
            @foreach($sliderProducts = $products::orderBy('id', 'DESC')->limit(4)->get() as $product)
                <div class="owl-item">
                    <div class="background_image"
                         style="background-image:url({{ $product->image->url }})"></div>
                    <div class="container fill_height">
                        <div class="row fill_height">
                            <div class="col fill_height">
                                <div class="home_container d-flex flex-column align-items-center justify-content-start">
                                    <div class="home_content">
                                        <div class="home_title">
                                            {{ $product->name }}
                                        </div>
                                        <div class="home_subtitle font-italic h5">
                                            {{ $product->category->name }}
                                        </div>
                                        <div class="home_items">
                                            <div class="row">
                                                <div class="col-sm-3 offset-lg-1">
                                                    <div class="home_item_side">
                                                        <a href="{{ url($product->slug) }}">
                                                            <img src="{{ $product->images->get(1)->url }}"
                                                                 alt="{{ $product->name }}"
                                                                 height="300">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-8 offset-sm-2 offset-md-0">
                                                    <a href="{{ url($product->slug) }}">
                                                        <div class="product home_item_large">
                                                            <div class="product_tag d-flex flex-column align-items-center justify-content-center">
                                                                <div>
                                                                    <div class="text-center">
                                                                        Now
                                                                    </div>
                                                                    <div>
                                                                    <span class="p-1">
                                                                        R{{ (int)$product->price }}<span>.{{ $product::decimal($product->price) }}</span>
                                                                    </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="product_image">
                                                                <img class="d-none d-md-block"
                                                                     src="{{ $product->image->url }}"
                                                                     alt="{{ $product->name }}"
                                                                     height="400">
                                                                <img class="d-sm-none"
                                                                     src="{{ $product->image->url }}"
                                                                     alt="{{ $product->name }}"
                                                                     height="300">
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
                                                                                In <a href="category.html">
                                                                                    {{ $product->category->name }}
                                                                                </a>
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
                                                                                    <img src="assets/app/images/heart.svg"
                                                                                         alt="Add To Likes">
                                                                                    <div>+</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                                                            <div>
                                                                                <div>
                                                                                    <img src="assets/app/images/cart_2.svg"
                                                                                         alt="Add To Category">
                                                                                    <div>+</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="home_item_side">
                                                        <a href="{{ url($product->slug) }}">
                                                            <img src="{{ $product->images->get(2)->url }}"
                                                                 alt="{{ $product->name }}"
                                                                 height="300">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="home_slider_nav home_slider_nav_prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
        <div class="home_slider_nav home_slider_nav_next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
        <!-- Home Slider Dots -->
        <div class="home_slider_dots_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_slider_dots">
                            <ul id="home_slider_custom_dots" class="home_slider_custom_dots d-flex flex-row align-items-center justify-content-center">
                                @for($i = 0; $i < count($sliderProducts); $i++)
                                    <li class="home_slider_custom_dot @if($i == 0) active @endif">
                                        {{ $i + 1 }}
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
