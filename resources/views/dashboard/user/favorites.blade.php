@extends('layouts.dashboard')
@section('content')
    <!-- Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">
            <i class="fas fa-heart text-danger text-primary"></i> User Favorite
        </h1>
    </div>
    <div class="row justify-content-center pt-2 pb-3 mt-md-4">
        <div class="col-md-3 mb-4">
            @include('components.dashboard.user.user-navigation', ['user' => $user])
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @include('components.app.user.profile_details', ['user' => $user])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3 mb-3">
                            @include('components.dashboard.favorite.list', ['favorites' => $user->favorites])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
