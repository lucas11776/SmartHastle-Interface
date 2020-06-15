@extends('layouts.app')
@section('content')
    <div class="super_container">
        <!-- Header -->
        @extends('components.app.header')
        <div class="super_container_inner">
            @extends('components.app.menu')
            <div class="super_overlay"></div>
            <div class="container products">
                <div class="row justify-content-center pt-5 mt-md-4">
                    <div class="col-md-3 mb-4">
                        @include('components.app.user.navigation')
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        @include('components.app.user.profile_details', ['user' => $user])
                                    </div>
                                </div>
                                <div class="row pt-2">
                                    <div class="col-md-12">
                                        @include('components.app.order.orders', ['orders' => $orders])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('components.app.footer')
        </div>
    </div>
@endsection
