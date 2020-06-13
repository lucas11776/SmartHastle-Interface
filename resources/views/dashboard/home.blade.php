@extends('layouts.dashboard')
@section('content')
    <!-- Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">
            <i class="fas fa-chart-pie text-primary"></i> Summary
        </h1>
    </div>
    <!-- Application Summary Details -->
    @include('dashboard.components.summary')
@endsection
