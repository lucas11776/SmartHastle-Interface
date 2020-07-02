<li class="list-group-item d-flex justify-content-between align-items-center">
    {{ $category->name }}
    <div class="dropdown">
        <button class="btn btn-circle btn-primary"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false">
            <span class="fas fa-edit"></span>
        </button>
        <div class="dropdown-menu dropdown-menu-right"
             style="min-width: 350px;"
             aria-labelledby="dropdownMenuLink">
            <form class="dropdown-item"
                  method="POST"
                  action="{{ url('category/' . $category->id) }}">
                @csrf
                @method('PATCH')
                <div class="input-group">
                    <input type="text"
                           name="name"
                           class="form-control"
                           placeholder="{{ $category->name }} to ..."
                           value="{{ $category->name }}">
                    <div class="input-group-append">
                        <button class="btn btn-danger"
                                data-toggle="modal"
                                data-target="#modal-delete-category-{{ $category->id }}"
                                type="button">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        <button class="btn btn-primary"
                                type="submit">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</li>
@include('components.dashboard.category.list-delete-item', ['category' => $category])
