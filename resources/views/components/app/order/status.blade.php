@switch($order->status)
    @case('declined')
    <span class="badge badge-danger">
        {{ ucfirst($order->status) }}
    </span>
    @break
    @case('waiting')
    <span class="badge badge-warning">
        {{ ucfirst($order->status) }}
    </span>
    @break
    @case('approved')
    <span class="badge badge-info">
        {{ ucfirst($order->status) }}
    </span>
    @break
    @case('completed')
    <span class="badge badge-success">
       {{ ucfirst($order->status) }}
    </span>
    @break
@endswitch
