<div class="fixed-bottom">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show m-0" role="alert">
            <strong><i class="fa fa-check-circle-o"></i></strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(session('info'))
        <div class="alert alert-info alert-dismissible fade show m-0" role="alert">
            <strong><i class="fa fa-info-circle"></i></strong> {{ session('info') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(session('warning'))
        <div class="alert alert-warning alert-dismissible fade show m-0" role="alert">
            <strong><i class="fa fa-warning"></i></strong> {{ session('warning') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(session('danger'))
        <div class="alert alert-danger alert-dismissible fade show m-0" role="alert">
            <strong><i class="fas fa-skull"></i></strong> {{ session('danger') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>

