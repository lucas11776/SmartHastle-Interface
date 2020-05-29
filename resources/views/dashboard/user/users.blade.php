@extends('layouts.dashboard')
@section('content')
    <!-- Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">
            <i class="fas fa-users-cog text-primary"></i> Accounts
        </h1>
        <a href="{{ url('dashboard/users/staff') }}"
           class="d-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-user-tie fa-sm text-white-50"></i>
            Staff
        </a>
    </div>
@endsection
