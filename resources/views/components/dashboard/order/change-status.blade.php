<div class="btn-group btn-group-sm change-order-{{ $order->id }}-btn"
     role="group"
     aria-label="Order status.">
    <button type="button"
            class="btn btn-{{ $order->status == 'declined' ? 'outline-' : '' }}danger"
            data-toggle="modal"
            data-target="#order-{{ $order->id }}-status-modal"
            value="declined">
        Decline
    </button>
    <button type="button"
            class="btn btn-{{ $order->status == 'waiting' ? 'outline-' : '' }}warning"
            data-toggle="modal"
            data-target="#order-{{ $order->id }}-status-modal"
            value="waiting">
        Waiting
    </button>
    <button type="button"
            class="btn btn-{{ $order->status == 'approved' ? 'outline-' : '' }}info"
            data-toggle="modal"
            data-target="#order-{{ $order->id }}-status-modal"
            value="approved">
        Approve
    </button>
    <button type="button"
            class="btn btn-{{ $order->status == 'completed' ? 'outline-' : '' }}success"
            data-toggle="modal"
            data-target="#order-{{ $order->id }}-status-modal"
            value="completed">
        Complete
    </button>
    <script>
        $('.change-order-{{ $order->id }}-btn button').click(function() {
            let status = $(this);
            $('#change-order-{{ $order->id }}-input').val(status.val());
            $('.change-order-{{ $order->id }}-status').text(status.text());
        });
    </script>
</div>
<div class="modal fade border-primary"
     id="order-{{ $order->id }}-status-modal"
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
                    <span class="change-order-{{ $order->id }}-status"></span> Order.
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
                    @method('PATCH')
                    <input type="hidden"
                           name="status"
                           id="change-order-{{ $order->id }}-input">
                    <button type="submit"
                            class="btn btn-primary">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
