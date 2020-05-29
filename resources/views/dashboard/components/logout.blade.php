<div class="modal fade"
     id="logoutModal"
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
                    Ready to Leave?
                </h5>
                <button class="close"
                        type="button"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Select "<i class="text-primary">Logout</i>" below if you are ready to end your current session.
            </div>
            <form class="modal-footer"
                  method="POST"
                  action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-secondary"
                        type="button"
                        data-dismiss="modal">
                    Cancel
                </button>
                <button class="btn btn-primary"
                        type="submit">
                    <i class="fas fa-door-closed"></i> Logout
                </button>
            </form>
        </div>
    </div>
</div>
