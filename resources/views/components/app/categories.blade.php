@inject('categories', App\Category)
<div class="row page_nav_row">
    <div class="col">
        <div class="page_nav">
            <ul class="d-flex flex-row align-items-start justify-content-center">
                @foreach($categories::all() as $category)
                    <li>
                        <a href="categories/{{ $category->slug }}">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
