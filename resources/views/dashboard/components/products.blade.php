<div class="row">
    @foreach($products as $product)
        <div class="col-sm-6 col-md-4 col-lg-3 pb-3">
            <div class="card">
                <img src="{{ $product->image->url }}"
                     class="card-img-top"
                     alt="{{ $product->name }}"
                     height="300">
                <div class="card-body pt-2 pb-2">
                    <span class="h6">
                        {{ Str::limit($product->name, 30) }}
                    </span>
                </div>
                <ul class="list-group list-group-flush p-0 m-0">
                    <li class="list-group-item">
                        R {{ number_format($product->price, 2)  }}
                    </li>
                    <li class="list-group-item">
                        <a class="btn btn-outline-primary btn-block"
                           href="{{ url('dashboard/products/' . $product->id) }}">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    @endforeach
</div>
