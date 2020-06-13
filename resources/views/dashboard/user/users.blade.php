@extends('layouts.dashboard')
@section('content')
    <!-- Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">
            <i class="fas fa-users-cog text-primary"></i> Accounts
        </h1>
        <div class="btn-group" role="group" aria-label="Basic example">
            @foreach(App\Role::ROLES as $role)
                @switch($role)
                    @case('administrator')
                    <a href="{{ url('dashboard/users/role/'. $role) }}"
                       class="d-inline-block btn btn-sm btn-warning shadow-sm">
                        <i class="fas fa-laptop-code fa-sm text-white-50"></i>
                        {{ strtoupper($role) }}
                    </a>
                    @break
                    @case('staff')
                    <a href="{{ url('dashboard/users/role/'. $role) }}"
                       class="d-inline-block btn btn-sm btn-info shadow-sm">
                        <i class="fas fa-briefcase fa-sm text-white-50"></i>
                        {{ strtoupper($role) }}
                    </a>
                    @break
                @endswitch
            @endforeach
        </div>
    </div>
    @include('components.dashboard.user.users', ['user' => $users])
    <div class="pt-2 pb-2">
        {{ $users->links() }}
    </div>
@endsection
