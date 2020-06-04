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
                                @include('components.app.cart.size', ['product' => $product])
                                <div class="product_text">
                                    <p>{{ $product->description }}</p>
                                </div>
                                <div class="product_buttons">
                                    <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                        @include('components.app.favorite.add', ['item' => $product])
                                        @include('components.app.cart.add', ['item' => $product])
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
