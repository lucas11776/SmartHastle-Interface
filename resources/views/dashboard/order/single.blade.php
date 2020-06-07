@extends('layouts.dashboard')
@section('content')
    <!-- Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">
            <i class="fas fa-shopping-cart text-primary"></i> Single Order
        </h1>
        <a href="{{ url('dashboard/orders/status/waiting') }}"
           class="d-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-briefcase fa-sm text-white-50"></i>
            Decline
        </a>
    </div>
@endsection
