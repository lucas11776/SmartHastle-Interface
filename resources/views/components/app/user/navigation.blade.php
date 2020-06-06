@inject('route', Route)
<div class="list-group">
    <a href="{{ 'my/account' }}"
       class="list-group-item list-group-item-action {{ $route::current()->uri == 'my/account' ? 'active' : '' }}">
        <i class="fas fa-user-circle"></i> My Account
    </a>
    <a href="{{ 'my/favorites' }}"
       class="list-group-item list-group-item-action {{ $route::current()->uri == 'my/favorites' ? 'active' : '' }}">
        <i class="fas fa-heart"></i> Favorites
    </a>
    <a href="{{ url('my/orders') }}"
       class="list-group-item list-group-item-action {{ $route::current()->uri == 'my/orders' ? 'active' : '' }}">
        <i class="fas fa-ticket-alt"></i> Orders
    </a>
    <a href="{{ url('my/account/change/password') }}"
       class="list-group-item list-group-item-action {{ $route::current()->uri == 'my/account/change/password' ? 'active' : '' }}">
        <i class="fas fa-key"></i> Change Password
    </a>
</div>
