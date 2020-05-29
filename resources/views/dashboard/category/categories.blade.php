@extends('layouts.dashboard')
@section('content')
    <!-- Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">
            <i class="fas fa-list text-primary"></i> Categories
        </h1>
        <a href="{{ url('dashboard/categories/create') }}"
           class="d-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-edit fa-sm text-white-50"></i>
            Create Category
        </a>
    </div>
@endsection
