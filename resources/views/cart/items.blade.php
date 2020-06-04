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
                            My Shopping Cart
                        </div>
                        <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                            <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                                <li>
                                    <a href="{{ url('') }}">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    Cart
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
                    <div class="row cart_extra_row justify-content-center">
                        @include('components.app.cart.list-summary', ['cart' => auth()->user()->cart])
                    </div>
                </div>
            </div>
            @include('components.app.footer')
        </div>
    </div>
@endsection
