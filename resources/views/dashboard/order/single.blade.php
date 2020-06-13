@extends('layouts.dashboard')
@section('content')
    <!-- Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">
            <i class="fas fa-shopping-cart text-primary"></i> Single Order
        </h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 mt-2 mb-5">
            <div class="card bg-white p-4">
                @include('components.app.user.profile_details', ['user' => $order->user])
                <div class="row">
                    <div class="col-md-6 pb-4">
                        @include('components.dashboard.order.delete', ['order' => $order])
                    </div>
                    <div class="col-md-6 pb-4 text-md-right">
                        @include('components.dashboard.order.change-status', ['order' => $order])
                    </div>
                </div>
                @include('components.dashboard.order.order', ['order' => $order])
            </div>
        </div>
    </div>
@endsection
