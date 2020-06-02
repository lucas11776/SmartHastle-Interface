@extends('layouts.dashboard')
@section('content')
    <!-- Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">
            <i class="fas fa-shopping-cart text-primary"></i> Products
        </h1>
        <a href="{{ url('dashboard/products/upload') }}"
           class="d-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-upload fa-sm text-white-50"></i>
            Upload
        </a>
    </div>
    @include('dashboard.components.products', ['product.products' => $products])
@endsection
