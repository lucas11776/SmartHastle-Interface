<div class="row">
    <div class="col">
        <div class="cart_container">
            <div class="cart_bar">
                <ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-end">
                    <li class="mr-auto">Favorites</li>
                    <li>Action</li>
                    <li>Total</li>
                </ul>
            </div>
            <div class="cart_items">
                <ul class="cart_items_list">
                    @foreach($favorites as $item)
                        @include('components.app.favorite.list-item', ['item' => $item])
                    @endforeach
                </ul>
                @if($favorites->count() == 0)
                    <div class="cart_item_list">
                        <div class="row">
                            <div class="col-12 pt-4 pb-2">
                                <span class="text-info">
                                    <i class="fas fa-info-circle"></i> The are no favorite items yet please add some.
                                </span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            @if($favorites->count() != 0)
                <div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
                    <div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
                        <div class="button button_clear trans_200">
                            <a href="categories.html">Clear</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

