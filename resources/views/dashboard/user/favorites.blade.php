@extends('layouts.dashboard')
@section('content')
    <!-- Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">
            <i class="fas fa-heart text-danger text-primary"></i> User Favorite
        </h1>
    </div>
    <div class="row justify-content-center pt-2 pb-3 mt-md-4">
        <div class="col-md-3 mb-4">
            @include('components.dashboard.user.user-navigation', ['user' => $user])
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @include('components.app.user.profile_details', ['user' => $user])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">


                            <div class="row">
                                <div class="col">
                                    <div class="cart_container">
                                        <!-- Cart Bar -->
                                        <div class="cart_bar">
                                            <ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-end">
                                                <li class="mr-auto">Product</li>
                                                <li>Size</li>
                                                <li>Price</li>
                                                <li>Quantity</li>
                                                <li>Total</li>
                                            </ul>
                                        </div>
                                        <!-- Cart Items -->
                                        <div class="cart_items">
                                            <ul class="cart_items_list">
                                                <!-- Cart Item -->
                                                <li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
                                                    <div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
                                                        <div><div class="product_number">1</div></div>
                                                        <div><div class="product_image"><img src="images/cart_item_1.jpg" alt=""></div></div>
                                                        <div class="product_name_container">
                                                            <div class="product_name"><a href="product.html">Cool Flufy Clothing without Stripes</a></div>
                                                            <div class="product_text">Second line for additional info</div>
                                                        </div>
                                                    </div>
                                                    <div class="product_size product_text"><span>Size: </span>L</div>
                                                    <div class="product_price product_text"><span>Price: </span>$3.99</div>
                                                    <div class="product_quantity_container">
                                                        <div class="product_quantity ml-lg-auto mr-lg-auto text-center">
                                                            <span class="product_text product_num">1</span>
                                                            <div class="qty_sub qty_button trans_200 text-center"><span>-</span></div>
                                                            <div class="qty_add qty_button trans_200 text-center"><span>+</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="product_total product_text"><span>Total: </span>$3.99</div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- Cart Buttons -->
                                        <div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
                                            <div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
                                                <div class="button button_clear trans_200"><a href="categories.html">clear cart</a></div>
                                                <div class="button button_continue trans_200"><a href="categories.html">continue shopping</a></div>
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
    </div>
@endsection
