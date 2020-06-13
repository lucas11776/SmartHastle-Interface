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
                        <div class="col-md-12">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    First Name:
                                    <strong>{{ $user->first_name }}</strong>
                                </li>
                                <li class="list-group-item">
                                    Last Name:
                                    <strong>{{ $user->last_name }}</strong>
                                </li>
                                <li class="list-group-item">
                                    Email:
                                    <strong>{{ $user->email }}</strong>
                                </li>
                                <li class="list-group-item">
                                    Cellphone No:
                                    <strong>{{ $user->cellphone_number }}</strong>
                                </li>
                                <li class="list-group-item">
                                    <div class="row"
                                         style="line-height: 35px;">
                                        <div class="col-sm-2">
                                            User Roles:
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            @include('components.dashboard.user.remove-role', ['user' => $user])
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row"
                                         style="line-height: 35px;">
                                        <div class="col-sm-2">
                                            Add Role:
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            @include('components.dashboard.user.add-role', ['user' => $user])
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
