@extends('layouts.app')
@section('content')
    <div class="super_container">
        <!-- Header -->
        @extends('components.app.header')
        <div class="super_container_inner">
            @extends('components.app.menu')
            <div class="super_overlay"></div>
            <!-- Jumbotron -->
            @include('components.app.jumbotron')
            <!-- Products -->
            <div class="products">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="section_title text-center">
                                SmartHassle
                            </div>
                        </div>
                    </div>
                    @include('components.app.categories')
                    @include('components.app.products', ['products' => $products])
                    <div class="row load_more_row">
                        <div class="col">
                            <div class="button load_more ml-auto mr-auto">
                                <a href="{{ url('products') }}">
                                    <i class="fas fa-shopping-cart"></i> More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Features -->
            <div class="features">
                <div class="container">
                    <div class="row">
                        <!-- Feature -->
                        <div class="col-lg-4 feature_col">
                            <div class="feature d-flex flex-row align-items-start justify-content-start">
                                <div class="feature_left">
                                    <div class="feature_icon"><img src="assets/app/images/icon_1.svg" alt=""></div>
                                </div>
                                <div class="feature_right d-flex flex-column align-items-start justify-content-center">
                                    <div class="feature_title">Fast Secure Payments</div>
                                </div>
                            </div>
                        </div>
                        <!-- Feature -->
                        <div class="col-lg-4 feature_col">
                            <div class="feature d-flex flex-row align-items-start justify-content-start">
                                <div class="feature_left">
                                    <div class="feature_icon ml-auto mr-auto"><img src="assets/app/images/icon_2.svg" alt=""></div>
                                </div>
                                <div class="feature_right d-flex flex-column align-items-start justify-content-center">
                                    <div class="feature_title">Premium Products</div>
                                </div>
                            </div>
                        </div>
                        <!-- Feature -->
                        <div class="col-lg-4 feature_col">
                            <div class="feature d-flex flex-row align-items-start justify-content-start">
                                <div class="feature_left">
                                    <div class="feature_icon"><img src="assets/app/images/icon_3.svg" alt=""></div>
                                </div>
                                <div class="feature_right d-flex flex-column align-items-start justify-content-center">
                                    <div class="feature_title">Free Delivery</div>
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
