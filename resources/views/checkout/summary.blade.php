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
                        <div class="home_title">Checkout</div>
                        <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                            <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                                <li><a href="#">Home</a></li>
                                <li>Checkout</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Checkout -->
            <div class="checkout">
                <div class="container">
                    <div class="row justify-content-center">
                        <!-- Cart Total -->
                        <div class="col-md-10 col-lg-8 cart_col">
                            <div class="cart_total">
                                <div class="cart_extra_content cart_extra_total">
                                    <div class="checkout_title">
                                        Order Summary
                                    </div>
                                    <ul class="cart_extra_total_list">
                                        @foreach($cart as $item)
                                            <li class="d-flex flex-row align-items-center justify-content-start">
                                                <div class="cart_extra_total_title">
                                                    {{ Str::limit($item->cartable->name, 10) }}
                                                </div>
                                                <div class="cart_extra_total_value ml-auto">
                                                    R{{ number_format($item->cartable->price, 2) }}
                                                </div>
                                            </li>
                                        @endforeach
                                        <li class="d-flex flex-row align-items-center justify-content-start">
                                            <div class="cart_extra_total_title">
                                                Total
                                            </div>
                                            <div class="cart_extra_total_value ml-auto">
                                                R{{ $total }}
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="cart_text">
                                        <p>
                                            With the new SmartHassle order system make thing simple place your order and
                                            we will get back to you when we receive your order and we will contact you to
                                            confirm your order.
                                        </p>
                                    </div>
                                    <form id="create-order-form"
                                          action="{{ url('order') }}"
                                          method="POST">
                                        @csrf
                                    </form>
                                    <div class="checkout_button trans_200"
                                         onclick="event.preventDefault();document.getElementById('create-order-form').submit()"
                                         style="cursor: pointer;">
                                        <a>place order</a>
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
