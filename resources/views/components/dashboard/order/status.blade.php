@inject('order', App\Order)

<ul class="nav nav-pills">
    <li class="nav-item">
        <a class="nav-link @if(empty(Route::current()->parameter('status'))) active @endif"
           href="{{ url('dashboard/orders') }}">
            All
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
                    </span>
                    @break
                    @case('waiting')
                    <span class="text-warning">
                        {{ strtoupper($status) }}
                    </span>
                    @break
                    @case('approved')
                    <span class="text-info">
                        {{ strtoupper($status) }}
                    </span>
                    @break
                    @case('completed')
                    <span class="text-success">
                        {{ strtoupper($status) }}
                    </span>
                    @break
                @endswitch
            </a>
        </li>
    @endforeach
</ul>
