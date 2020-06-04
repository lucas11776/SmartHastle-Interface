<div class="product_size">
    <div class="product_size_title">Select Size</div>
    <ul class="d-flex flex-row align-items-start justify-content-start">
        @foreach($product::$sizes as $size)
            <li>
                <input type="radio"
                       id="product-{{ $size }}-radio"
                       name="product_{{ $product->id }}_size_radio"
                       class="regular_radio regular_radio_{{ $product->id }}"
                       value="{{ $size }}">
                <label for="product-{{ $size }}-radio">
                    {{ strtoupper($size) }}
                </label>
            </li>
        @endforeach
    </ul>
</div>
<script>
    $("input[name=product_{{ $product->id }}_size_radio]").on('change', function() {
        $('#product-{{ $product->id }}-size').val($(this).val());
        $('.regular_radio_{{ $product->id }}').prop('disabled', false);
        $(this).prop('disabled', true);
    });
</script>
