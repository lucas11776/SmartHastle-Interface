@extends('layouts.dashboard')
@section('content')
    <!-- Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">
            <i class="fas fa-chart-pie text-primary"></i> Orders
        </h1>
    </div>
    <div class="row">
        <div class="col-12 pb-4">
            @include('components.dashboard.order.status')
        </div>
        <div class="col-12">
            @include('components.dashboard.order.orders', ['orders' => $orders])
        </div>
        <div class="col-12 pt-2 pb-2">
            {{ $orders->links() }}
        </div>
    </div>
@endsection
