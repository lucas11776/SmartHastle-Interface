@extends('layouts.dashboard')
@section('content')
    <!-- Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">
            <i class="fas fa-user-alt text-primary"></i> User Account
        </h1>
    </div>
    <div class="row justify-content-center pt-2 pb-3 mt-md-4">
        <div class="col-md-3 mb-4">
            @include('components.dashboard.user.user-navigation', ['user' => $order->user])
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @include('components.app.user.profile_details', ['user' => $order->user])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr/>
                            <div class="row pt-4 pb-3">
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
            </div>
        </div>
    </div>
@endsection
