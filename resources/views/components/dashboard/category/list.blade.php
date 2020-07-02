<ul class="list-group">
    <li class="list-group-item d-flex justify-content-between align-items-center active">
        <span class="font-weight-bolder">
            Categories.
        </span>
        <a class="btn btn-circle btn-light"
           href="{{ url('dashboard/categories/create') }}">
            <span class="fas fa-plus-circle"></span>
        </a>
    </li>
    @foreach($categories as $category)
        @include('components.dashboard.category.list-item', ['category' => $category])
    @endforeach
</ul>
