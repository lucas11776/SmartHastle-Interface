@extends('layouts.dashboard')
@section('content')
    <!-- Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">
            <i class="fas fa-users-cog text-primary"></i> Accounts
        </h1>
    </div>

    <div class="pt-2 pb-2">
        {{ $orders->links() }}
    </div>
@endsection
