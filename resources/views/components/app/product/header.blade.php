<div class="home">
    <div class="home_container d-flex flex-column align-items-center justify-content-end">
        <div class="home_content text-center">
            <div class="home_title">
                {{ $product->name }}
            </div>
            <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                    <li>
                        Categories
                    </li>
                    <li>
                        <a href="categories/{{ $product->category->slug }}">
                            {{ $product->category->name }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
