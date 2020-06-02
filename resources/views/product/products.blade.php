@extends('layouts.app')
@section('content')
    <div class="super_container mt-5">
        @extends('components.app.header')
        <div class="super_container_inner">
            @extends('components.app.menu')
            <div class="super_overlay"></div>
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
                    @include('components.app.product.products', ['product.products' => $products])
                    <div class="row pt-3">
                        <div class="col">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
            @include('components.app.footer')
        </div>
    </div>
@endsection
