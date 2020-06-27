@inject('product', App\Product)
<form action="{{ url('order/' . $order->id . '/item/' . $item->id) }}"
      method="POST"
      class="input-group">
    @csrf
    @method('PATCH')
    <select type="text"
            name="size"
            class="form-control"
            placeholder="Recipient's username"
            aria-label="Recipient's username"
            aria-describedby="button-addon2">
        <option value="{{ $item->size }}">
            {{ is_null($item->size) ? 'Select Size...' :  strtoupper($item->size)}}
        </option>
        @foreach($product::$sizes as $size)
            @if($size != $item->size)
                <option value="{{ $size }}">
                    {{ strtoupper($size) }}
                </option>
            @endif
        @endforeach
    </select>
    <div class="input-group-append">
        <button class="btn btn-success"
                type="submit"
                id="button-addon2">
            <i class="fas fa-male"></i>
        </button>
    </div>
</form>
