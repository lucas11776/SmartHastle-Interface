<table class="table table-hover table-responsive-sm">
    <thead>
    <tr>
        <th>#ID</th>
        <th><i class="fas fa-calendar-o"></i> Date</th>
        <th><i class="fas fa-battery-3"></i> Status</th>
        <th><i class="fas fa-shopping-bag"></i> No. Items</th>
        <th><i class="fas fa-money"></i> Total Price</th>
    </tr>
    </thead>
    <tbody class="">
    @foreach($orders as $order)
        <tr style="cursor: pointer;"
            onclick="event.preventDefault();location.href='{{ url('my/orders/' . $order->id) }}'">
            <td>{{ $order->id }}</td>
            <td>{{ date('l d M Y h:ma', strtotime($order->created_at)) }}</td>
            <td>@include('components.app.order.status', ['order' => $order])</td>
            <td>{{ $order->items()->count() }}</td>
            <td>R{{ App\Product::price($order->items()) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
