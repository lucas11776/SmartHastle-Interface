<div class="product_image_slider_container bg-gradient-info">
    <div id="slider"
         class="flexslider">
        <ul class="slides">
            @foreach($product->images as $image)
                <li>
                    <img src="{{ $image->url }}" />
                </li>
            @endforeach
        </ul>
    </div>
    <div class="carousel_container">
        <div id="carousel"
             class="flexslider">
            <ul class="slides">
                @foreach($product->images as $image)
                    <li>
                        <div>
                            <img src="{{ $image->url }}"/>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="fs_prev fs_nav disabled"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
        <div class="fs_next fs_nav"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
    </div>
</div>
