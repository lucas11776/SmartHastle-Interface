@inject('route', Route)
<div class="list-group">
    <a href="{{ url('my/account/change/password') }}"
       class="list-group-item d-flex justify-content-between align-items-center {{ $route::current()->uri == 'dashboard/users/{user}' ? 'active' : '' }}">
        <span>
            <i class="fas fa-user"></i> Account
        </span>
    </a>
    <a href="{{ '/account' }}"
       class="list-group-item d-flex justify-content-between align-items-center {{ $route::current()->uri == 'dashboard/users/{user}/orders' ? 'active' : '' }}">
        <span>
            <i class=
               "fas fa-ticket-alt"></i> Orders
        </span>
        <span class="badge badge-info badge-pill">
            {{ $user->orders()->count() }}
        </span>
    </a>
    <a href="{{ 'my/favorites' }}"
       class="list-group-item d-flex justify-content-between align-items-center {{ $route::current()->uri == 'dashboard/users/{user}/cart' ? 'active' : '' }}">
        <span>
            <i class="fas fa-shopping-cart"></i> Cart
        </span>
        <span class="badge badge-info badge-pill">
            {{ $user->cart()->count() }}
        </span>
    </a>
    <a href="{{ url('my/orders') }}"
       class="list-group-item d-flex justify-content-between align-items-center {{ $route::current()->uri == 'dashboard/users/{user}/favorites' ? 'active' : '' }}">
        <span>
            <i class="fas fa-heart text-danger"></i> Favorites
        </span>
        <span class="badge badge-info badge-pill">
            -
        </span>
    </a>
</div>
