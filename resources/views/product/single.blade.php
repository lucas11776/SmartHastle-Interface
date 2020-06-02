@extends('layouts.app')
@section('content')
    <div class="super_container">
        @extends('components.app.header')
        <div class="super_container_inner">
            @extends('components.app.menu')
            <div class="super_overlay"></div>
            <!-- Header -->
            @include('components.app.product.header', ['product' => $product])
            <div class="product">
                <div class="container">
                    <div class="row">
                        <!-- Product Image -->
                        <div class="col-lg-6">
                            @include('components.app.product.slider', ['product' => $product])
                        </div>
                        <!-- Product Info -->
                        <div class="col-lg-6 product_col">
                            <div class="product_info">
                                <div class="product_name">
                                    {{ $product->name }}
                                </div>
                                <div class="product_category">
                                    <a href="{{ url('categories/' . $product->category->slug) }}">
                                        {{ $product->category->name }}
                                    </a>
                                </div>
                                <div class="product_price">
                                    R{{ (int)$product->price }}<span>.{{ $product::decimal($product->price) }}</span>
                                </div>
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
                                    <p>{{ $product->description }}</p>
                                </div>
                                <div class="product_buttons">

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
