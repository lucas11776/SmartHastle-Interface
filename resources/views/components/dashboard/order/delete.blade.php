<button type="button"
        class="btn btn-circle btn-danger btn-sm"
        data-toggle="modal"
        data-target="#delete-order-{{ $order->id }}-modal">
    <i class="fas fa-trash-alt"></i>
</button>
<div class="modal fade border-primary"
     id="delete-order-{{ $order->id }}-modal"
     tabindex="-1"
     role="dialog"
     aria-labelledby="exampleModalLongTitle"
     aria-hidden="true">
    <div class="modal-dialog"
         role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    id="exampleModalLongTitle">
                    <i class="fas fa-trash-alt text-danger"></i> Delete Order.
                </h5>
                <button type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">
                    Close
                </button>
                <form action="{{ url('order/' . $order->id) }}"
                      method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="btn btn-primary">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
