@extends('layouts.app')
@section('content')
    <div class="super_container mt-5">
        @extends('components.app.header')
        <div class="super_container_inner">
            @extends('components.app.menu')
            <div class="super_overlay"></div>
            <!-- Home -->
            <div class="home">
                <div class="home_container d-flex flex-column align-items-center justify-content-end">
                    <div class="home_content text-center">
                        <div class="home_title">
                            Shopping Cart
                        </div>
                        <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                            <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                                <li><a href="#">
                                        Home
                                    </a></li>
                                <li>
                                    Your Cart
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Cart -->
            <div class="cart_section">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            @include('components.app.cart.list', ['items' => $items])
                        </div>
                    </div>
                    <div class="row cart_extra_row">
                        <div class="col-lg-6">
                            <div class="cart_extra cart_extra_1">
                                <div class="cart_extra_content cart_extra_coupon">
                                    <div class="cart_extra_title">Coupon code</div>
                                    <div class="coupon_form_container">
                                        <form action="#" id="coupon_form" class="coupon_form">
                                            <input type="text" class="coupon_input" required="required">
                                            <button class="coupon_button">apply</button>
                                        </form>
                                    </div>
                                    <div class="coupon_text">Phasellus sit amet nunc eros. Sed nec congue tellus. Aenean nulla nisl, volutpat blandit lorem ut.</div>
                                    <div class="shipping">
                                        <div class="cart_extra_title">Shipping Method</div>
                                        <ul>
                                            <li class="shipping_option d-flex flex-row align-items-center justify-content-start">
                                                <label class="radio_container">
                                                    <input type="radio" id="radio_1" name="shipping_radio" class="shipping_radio">
                                                    <span class="radio_mark"></span>
                                                    <span class="radio_text">Next day delivery</span>
                                                </label>
                                                <div class="shipping_price ml-auto">$4.99</div>
                                            </li>
                                            <li class="shipping_option d-flex flex-row align-items-center justify-content-start">
                                                <label class="radio_container">
                                                    <input type="radio" id="radio_2" name="shipping_radio" class="shipping_radio">
                                                    <span class="radio_mark"></span>
                                                    <span class="radio_text">Standard delivery</span>
                                                </label>
                                                <div class="shipping_price ml-auto">$1.99</div>
                                            </li>
                                            <li class="shipping_option d-flex flex-row align-items-center justify-content-start">
                                                <label class="radio_container">
                                                    <input type="radio" id="radio_3" name="shipping_radio" class="shipping_radio" checked>
                                                    <span class="radio_mark"></span>
                                                    <span class="radio_text">Personal Pickup</span>
                                                </label>
                                                <div class="shipping_price ml-auto">Free</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 cart_extra_col">
                            <div class="cart_extra cart_extra_2">
                                <div class="cart_extra_content cart_extra_total">
                                    <div class="cart_extra_title">Cart Total</div>
                                    <ul class="cart_extra_total_list">
                                        <li class="d-flex flex-row align-items-center justify-content-start">
                                            <div class="cart_extra_total_title">Subtotal</div>
                                            <div class="cart_extra_total_value ml-auto">$29.90</div>
                                        </li>
                                        <li class="d-flex flex-row align-items-center justify-content-start">
                                            <div class="cart_extra_total_title">Shipping</div>
                                            <div class="cart_extra_total_value ml-auto">Free</div>
                                        </li>
                                        <li class="d-flex flex-row align-items-center justify-content-start">
                                            <div class="cart_extra_total_title">Total</div>
                                            <div class="cart_extra_total_value ml-auto">$29.90</div>
                                        </li>
                                    </ul>
                                    <div class="checkout_button trans_200">
                                        <a href="{{ url('checkout') }}">
                                            Proceed to checkout
                                        </a>
                                    </div>
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
