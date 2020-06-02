@extends('layouts.app')
@section('content')
    <div class="super_container">
        <!-- Header -->
        @extends('components.app.header')
        <div class="super_container_inner">
            <div class="super_overlay"></div>
            <!-- Home -->
            <div class="home">
                <div class="home_container d-flex flex-column align-items-center justify-content-end">
                    <div class="home_content text-center">
                        <div class="home_title">
                            Product Page
                        </div>
                        <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                            <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                                <li>
                                    <a href="#">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="category.html">
                                        Woman
                                    </a>
                                </li>
                                <li>
                                    New Products
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product -->
            <div class="product">
                <div class="container">
                    <div class="row">
                        <!-- Product Image -->
                        <div class="col-lg-6">
                            <div class="product_image_slider_container">
                                <div id="slider"
                                     class="flexslider">
                                    <ul class="slides">
                                        @foreach($product->images as $image)
                                            <li>
                                                <img src="{{ $image->url }}" />
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="carousel_container">
                                    <div id="carousel"
                                         class="flexslider">
                                        <ul class="slides">
                                            @foreach($product->images as $image)
                                                <li>
                                                    <div>
                                                        <img src="{{ $image->url }}" />
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="fs_prev fs_nav disabled"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                    <div class="fs_next fs_nav"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>

                        <!-- Product Info -->
                        <div class="col-lg-6 product_col">
                            <div class="product_info">
                                <div class="product_name">Cool Clothing with Brown Stripes</div>
                                <div class="product_category">In <a href="category.html">Category</a></div>
                                <div class="product_rating_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                    <div class="product_reviews">4.7 out of (3514)</div>
                                    <div class="product_reviews_link"><a href="#">Reviews</a></div>
                                </div>
                                <div class="product_price">$3<span>.99</span></div>
                                <div class="product_size">
                                    <div class="product_size_title">Select Size</div>
                                    <ul class="d-flex flex-row align-items-start justify-content-start">
                                        <li>
                                            <input type="radio" id="radio_1" disabled name="product_radio" class="regular_radio radio_1">
                                            <label for="radio_1">XS</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="radio_2" name="product_radio" class="regular_radio radio_2" checked>
                                            <label for="radio_2">S</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="radio_3" name="product_radio" class="regular_radio radio_3">
                                            <label for="radio_3">M</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="radio_4" name="product_radio" class="regular_radio radio_4">
                                            <label for="radio_4">L</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="radio_5" name="product_radio" class="regular_radio radio_5">
                                            <label for="radio_5">XL</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="radio_6" disabled name="product_radio" class="regular_radio radio_6">
                                            <label for="radio_6">XXL</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product_text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nec consequat lorem. Maecenas elementum at diam consequat bibendum. Mauris iaculis fringilla ex, sit amet semper libero facilisis sit amet. Nunc ut aliquet metus. Praesent pulvinar justo sed velit tempus bibendum. Quisque dictum lorem id mi viverra, in auctor justo laoreet. Nam at massa malesuada, ullamcorper metus vel, consequat risus. Phasellus ultricies velit vel accumsan porta.</p>
                                </div>
                                <div class="product_buttons">
                                    <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                        <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                                            <div><div><img src="asserts/app/images/heart_2.svg" class="svg" alt=""><div>+</div></div></div>
                                        </div>
                                        <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                            <div><div><img src="asserts/app/images/cart.svg" class="svg" alt=""><div>+</div></div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Boxes -->

            <div class="boxes">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box d-flex flex-row align-items-center justify-content-start">
                                <div class="mt-auto"><div class="box_image"><img src="assets/app/images/boxes_1.png" alt=""></div></div>
                                <div class="box_content">
                                    <div class="box_title">Size Guide</div>
                                    <div class="box_text">Phasellus sit amet nunc eros sed nec tellus.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 box_col">
                            <div class="box d-flex flex-row align-items-center justify-content-start">
                                <div class="mt-auto"><div class="box_image"><img src="assets/app/images/boxes_2.png" alt=""></div></div>
                                <div class="box_content">
                                    <div class="box_title">Shipping</div>
                                    <div class="box_text">Phasellus sit amet nunc eros sed nec tellus.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('components.app.footer')
        </div>
    </div>
@endsection
