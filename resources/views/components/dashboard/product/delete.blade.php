<div class="modal fade"
     id="delete-product-{{ $product->id }}"
     tabindex="-1"
     role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog"
         role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    id="exampleModalLabel">
                    <i class="fas fa-trash text-danger"></i> {{ $product->name }}.
                </h5>
                <button class="close"
                        type="button"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Delete product and product records form database.
            </div>
            <form action="{{ url('product/' . $product->id) }}"
                  method="POST"
                  class="modal-footer">
                @csrf
                @method('delete')
                <button class="btn btn-secondary"
                        type="button"
                        data-dismiss="modal">
                    <i class="fas fa-window-close"></i> Cancel
                </button>
                <button class="btn btn-danger"
                        type="submit">
                    <i class="fas fa-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>
</div>
