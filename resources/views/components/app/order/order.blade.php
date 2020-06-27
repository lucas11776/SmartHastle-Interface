<div class="row">
    <div class="col">
        <div class="cart_container">
            <div class="cart_bar">
                <ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-end">
                    <li class="mr-auto">#ID</li>
                    <li>Size</li>
                    <li>Price</li>
                    @if($order->status == 'waiting')
                        <li>Size</li>
                    @endif
                </ul>
            </div>
            <div class="cart_items">
                <ul class="cart_items_list">
                    @foreach($order->items as $item)
                        @include('components.app.order.order-item', ['item' => $item, 'order' => $order])
                    @endforeach
                    <div class="row justify-content-end pr-4 pt-5 pb-4">
                        <div class="font-weight-bold h5">
                            Total : R<span>{{ $order->total() }}</span>
                        </div>
                    </div>
                    <hr>
                </ul>
            </div>
        </div>
    </div>
</div>
