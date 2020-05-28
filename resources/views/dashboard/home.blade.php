@extends('layouts.dashboard')
@section('content')
    <!-- Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">
            Dashboard
        </h1>
        <a href="#"
           class="d-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-envelope-open-text fa-sm text-white-50"></i>
            Messages
        </a>
        <a href="#"
               class="d-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-ticket-alt fa-sm text-white-50"></i>
            Orders
        </a>
    </div>
    <!-- Application Summary Details -->
    @include('dashboard.components.summary')
@endsection
