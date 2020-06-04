<div class="list-group">
    <a href="{{ 'my/account' }}"
       class="list-group-item list-group-item-action active">
        <i class="fas fa-user-circle"></i> My Account
    </a>
    <a href="{{ url('my/cart') }}"
       class="list-group-item list-group-item-action">
        <i class="fas fa-shopping-cart"></i> Cart
    </a>
    <a href="{{ 'my/favorites' }}"
       class="list-group-item list-group-item-action">
        <i class="fas fa-heart"></i> Favorites
    </a>
    <a href="{{ url('my/order') }}"
       class="list-group-item list-group-item-action">
        <i class="fas fa-ticket-alt"></i> Orders
    </a>
    <a href="{{ url('my/account/change/password') }}"
       class="list-group-item list-group-item-action">
        <i class="fas fa-key"></i> Change Password
    </a>
</div>
