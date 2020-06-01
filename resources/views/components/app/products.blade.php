<div class="row products_row">
    @foreach($products as $product)
        <div class="col-xl-4 col-md-6">
            @include('components.app.product')
        </div>
    @endforeach
</div>
