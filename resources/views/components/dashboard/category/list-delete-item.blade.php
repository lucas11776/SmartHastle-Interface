<div class="modal fade"
     id="modal-delete-category-{{ $category->id }}"
     tabindex="-1"
     role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    id="exampleModalLabel">
                    <i class="fas fa-trash-alt"></i> Delete Category.
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span>
                    Are you sure you want to delete "<i class="text-info">{{ $category->name }}</i>" category in the database.
                </span>
            </div>
            <form class="modal-footer"
                  method="POST"
                  action="{{ url('category/' . $category->id) }}">
                @csrf
                @method('DELETE')
                <button type="button"
                        class="btn btn-info"
                        data-dismiss="modal">
                    <i class="fa fa-times-circle"></i> Cancel
                </button>
                <button type="submit"
                        class="btn btn-danger">
                    <i class="fas fa-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>
</div>
