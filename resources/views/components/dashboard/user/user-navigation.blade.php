@inject('route', Route)
<div class="list-group">
    <a href="{{ url('dashboard/users/' . $user->id) }}"
       class="list-group-item d-flex justify-content-between align-items-center {{ $route::current()->uri == 'dashboard/users/{user}' ? 'active' : '' }}">
        <span>
            <i class="fas fa-user"></i> Account
        </span>
    </a>
    <a href="{{ url('dashboard/users/' . $user->id . '/orders') }}"
       class="list-group-item d-flex justify-content-between align-items-center {{ $route::current()->uri == 'dashboard/users/{user}/orders' ? 'active' : '' }}">
        <span>
            <i class=
               "fas fa-ticket-alt"></i> Orders
        </span>
        <span class="badge badge-info badge-pill">
            {{ $user->orders()->count() }}
        </span>
    </a>
    <a href="{{ url('dashboard/users/' . $user->id . '/cart') }}"
       class="list-group-item d-flex justify-content-between align-items-center {{ $route::current()->uri == 'dashboard/users/{user}/cart' ? 'active' : '' }}">
        <span>
            <i class="fas fa-shopping-cart"></i> Cart
        </span>
        <span class="badge badge-info badge-pill">
            {{ $user->cart()->count() }}
        </span>
    </a>
    <a href="{{ url('dashboard/users/' . $user->id . '/favorites') }}"
       class="list-group-item d-flex justify-content-between align-items-center {{ $route::current()->uri == 'dashboard/users/{user}/favorites' ? 'active' : '' }}">
        <span>
            <i class="fas fa-heart text-danger"></i> Favorites
        </span>
        <span class="badge badge-info badge-pill">
            {{ $user->favorites()->count() }}
        </span>
    </a>
</div>
