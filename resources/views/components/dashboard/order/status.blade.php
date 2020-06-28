@inject('order', App\Order)

<ul class="nav nav-pills">
    <li class="nav-item">
        <a class="nav-link @if(empty(Route::current()->parameter('status'))) active @endif"
           href="{{ url('dashboard/orders') }}">
            All
            <span class="badge badge-info ml-1">
                {{ $order->count() }}
            </span>
        </a>
    </li>
    @foreach($order::STATUS as $status)
        <li class="nav-item">
            <a class="nav-link @if(Route::current()->parameter('status') == $status) active @endif"
               href="{{ url('dashboard/orders/status/' . $status) }}">
                @switch($status)
                    @case('declined')
                    <span class="text-danger">
                        {{ strtoupper($status) }}
                        <span class="badge badge-info ml-1">
                            {{ $order->where('status', $status)->count() }}
                        </span>
                    </span>
                    @break
                    @case('waiting')
                    <span class="text-warning">
                        {{ strtoupper($status) }}
                         <span class="badge badge-info ml-1">
                            {{ $order->where('status', $status)->count() }}
                        </span>
                    </span>
                    @break
                    @case('approved')
                    <span class="text-info">
                        {{ strtoupper($status) }}
                         <span class="badge badge-info ml-1">
                            {{ $order->where('status', $status)->count() }}
                        </span>
                    </span>
                    @break
                    @case('completed')
                    <span class="text-success">
                        {{ strtoupper($status) }}
                        <span class="badge badge-info ml-1">
                            {{ $order->where('status', $status)->count() }}
                        </span>
                    </span>
                    @break
                @endswitch
            </a>
        </li>
    @endforeach
</ul>
