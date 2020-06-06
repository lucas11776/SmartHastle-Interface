<div class="row">
    <div class="col-12 col-sm-auto mb-3">
        <div class="mx-auto" style="width: 140px;">
            <div class="d-flex justify-content-center align-items-center rounded"
                 style="height: 140px; background-color: rgb(233, 236, 239);">
                <img src="{{ $user->image->url }}"
                     alt="{{ $user->first_name . ' ' . $user->last_name }}"
                     class="img-thumbnail border-primary shadow"
                     style="width:100%;height:100%;">
            </div>
        </div>
    </div>
    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
        <div class="text-center text-sm-left mb-2 mb-sm-0">
            <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">
                {{ $user->first_name . ' ' . $user->last_name }}
            </h4>
            <p class="mb-0">
                <a href="mailto:{{ $user->email }}"
                   class="btn-link">
                    {{ $user->email }}
                </a>
            </p>
            <div class="text-muted font-weight-bolder pt-1 pb-1">
                @if($user->cellphone_number)
                    <span class="h6">
                        <a href="tel:{{ $user->cellphone_number }}"
                           class="btn-link">
                            <i class="fas fa-phone-alt"></i> {{ $user->cellphone_number }}
                        </a>
                    </span>
                @endif
            </div>
            <div class="mt-2">
                @include('components.app.user.change_profile_picture_form')
            </div>
        </div>
        <div class="text-center text-sm-right">
            <span class="badge badge-secondary">administrator</span>
            <div class="text-muted">
                <small>Joined {{ date('l d M Y h:ma', strtotime($user->created_at)) }}</small>
            </div>
        </div>
    </div>
</div>
