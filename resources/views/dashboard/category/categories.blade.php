@extends('layouts.dashboard')
@inject('categories', App\Category)
@section('content')
    <!-- Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">
            <i class="fas fa-list text-primary"></i> Categories
        </h1>
    </div>
    <div class="row justify-content-center pt-4 pb-5 mb-md-3">
        <div class="col-sm-8 col-md-6 col-lx-4">
            @include('components.dashboard.category.list', ['categories' => $categories::all()])
        </div>
    </div>
@endsection
