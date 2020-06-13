<table class="table table-hover table-responsive-sm"
       style="line-height: 55px;">
    <thead>
    <tr>
        <th scope="col">#ID</th>
        <th scope="col">Preview</th>
        <th scope="col">Name</th>
        <th scope="col">Size</th>
        <th scope="col">Price</th>
        <th scope="col">Edit Size</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($order->items as $item)
        <tr style="cursor: pointer;">
            <th scope="row">
                {{ $item->product->id }}
            </th>
            <td>
                <img src="{{ $item->product->image->url }}"
                     style="width: 55px; height: 55px;"
                     class="img-thumbnail"
                     onclick="event.preventDefault();location.href='{{ url($item->product->slug) }}'">
            </td>
            <td>
                <a href="{{ url($item->product->slug) }}">
                    {{ $item->product->name }}
                </a>
            </td>
            <td>
                {{ strtoupper($item->size) }}
            </td>
            <td>
                R{{ $item->product->price }}
            </td>
            <td>
                <div style="position: relative; top: 8px;">
                    @include('components.dashboard.order.edit-size', ['item' => $item])
                </div>
            </td>
            <td>
                <button class="btn btn-sm btn-circle btn-danger">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>
    @endforeach
    <tr>
        <th scope="row"
            colspan="4"
            class="text-right">
            Order Total:
        </th>
        <th>
            R{{ App\Product::price($order->items()) }}
        </th>
        <th scope="row"
            colspan="2"></th>
    </tr>
    </tbody>
</table>
