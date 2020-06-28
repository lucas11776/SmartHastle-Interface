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
                                {{ env('APP_NAME') }}
                            </div>
                        </div>
                    </div>
                    @include('components.app.categories')
                    @include('components.app.product.products', ['product.products' => $products])
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
            @include('components.app.features')
            @include('components.app.footer')
        </div>
    </div>
@endsection
