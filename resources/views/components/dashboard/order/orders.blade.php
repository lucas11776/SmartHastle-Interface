<table class="table table-hover bg-white text-center table-responsive-sm"
       style="line-height: 55px">
    <thead>
    <tr>
        <th>#ID</th>
        <th><i class="fas fa-image"></i> Profile</th>
        <th><i class="fas fa-user"></i> FullName</th>
        <th><i class="fas fa-calendar"></i> Date</th>
        <th><i class="fas fa-ticket-alt"></i> Status</th>
        <th><i class="fas fa-shopping-bag"></i> No. Items</th>
        <th><i class="fas fa-money-bill"></i> Total Price</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr style="cursor: pointer;"
            onclick="event.preventDefault();location.href='{{ url('dashboard/orders/' . $order->id) }}'">
            <td>{{ $order->id }}</td>
            <td>
                <img src="{{ $order->user->image->url }}"
                     style="width: 55px; height: 55px; border-radius: 100%"
                     class="img-thumbnail border-primary">
            </td>
            <td>{{ $order->user->first_name . ' ' . $order->user->last_name }}</td>
            <td>{{ date('d M Y h:ma', strtotime($order->created_at)) }}</td>
            <td>@include('components.app.order.status', ['order' => $order])</td>
            <td>{{ $order->items()->count() }}</td>
            <td>R{{ App\Product::price($order->items()) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
