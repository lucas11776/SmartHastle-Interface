@extends('layouts.dashboard')
@section('content')
    <!-- Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">
            <i class="fas fa-shopping-cart text-primary"></i> User Cart
        </h1>
    </div>
    <div class="row justify-content-center pt-2 pb-3 mt-md-4 mb-4">
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
                        <div class="col-md-12 mt-3 mb-3">
                            <div class="row">
                                <div class="col">
                                    <div class="cart_container">
                                        <!-- Cart Bar -->
                                        <div class="cart_bar">
                                            <ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-end">
                                                <li class="mr-auto">Cart Items</li>
                                                <li>Size</li>
                                                <li>Price</li>
                                            </ul>
                                        </div>
                                        <!-- Cart Items -->
                                        <div class="cart_items">
                                            <ul class="cart_items_list">
                                                @foreach($user->cart as $item)
                                                    @include('components.dashboard.cart.item', ['item' => $item])
                                                @endforeach
                                                <li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
                                                    <div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
                                                        <div>
                                                            <div class="product_number"></div>
                                                        </div>
                                                        <div>
                                                            <div class="product_image"></div>
                                                        </div>
                                                        <div class="product_name_container">
                                                            <div class="product_name"></div>
                                                            <div class="product_text"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product_size product_text">
                                                        <i class="ml-2 ml-lg-0 text-info">
                                                            Cart-Total
                                                        </i>
                                                    </div>
                                                    <div class="product_total product_text">
                                                        <span></span>R{{ $user->cartTotal() }}
                                                    </div>
                                                </li>
                                            </ul>
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
