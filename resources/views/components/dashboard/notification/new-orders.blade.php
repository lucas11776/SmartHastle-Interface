@inject('order', App\Order)
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle"
       href="#"
       id="alertsDropdown"
       role="button"
       data-toggle="dropdown"
       aria-haspopup="true"
       aria-expanded="false">
        <i class="fas fa-bell fa-fw" title="Waiting Order List..."></i>
        <span class="badge badge-danger badge-counter">
            {{ ($waitingListOrdersQuery = $order->where('status', 'waiting'))->count() }}
        </span>
    </a>
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
         style="min-width: 350px;"
         aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
            <i class="fas fa-globe"></i> Online Order Requests.
        </h6>
        @foreach($waitingListOrdersQuery->limit(5)->get() as $order)
            <a class="dropdown-item d-flex align-items-center"
               href="{{ url("dashboard/users/{$order->user->id}/orders/{$order->id}") }}">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle"
                         src="{{ $order->user->image->url }}"
                         alt="{{ $order->user->first_name . ' ' . $order->user->last_name }}">
                </div>
                <div>
                    <div class="small text-gray-500">
                        {{ date('l d M Y h:ma', strtotime($order->create_at)) }}
                    </div>
                    <span class="font-weight-bold">
                        <span class="text-info"
                              onclick="event.preventDefault();location.href='{{ url('dashboard/users/' . $order->user->id) }}'">
                            {{ ucfirst($order->user->first_name . ' ' . $order->user->last_name) }}
                        </span>
                        has order
                        <span class="text-info">
                            {{ $order->items->count() }}
                        </span>
                        product that total to a price of
                        <span class="text-info">
                            R{{ App\Product::price($order->items()) }}
                        </span>
                    </span>
                </div>
            </a>
        @endforeach
        <a class="dropdown-item text-center small text-gray-500"
           href="{{ url('dashboard/orders/status/waiting') }}">
            Show All New Order Request.
        </a>
    </div>
</li>
