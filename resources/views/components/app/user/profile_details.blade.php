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
            <h4 class="pt-sm-3 pb-1 mb-0 text-nowrap">
                {{ $user->first_name . ' ' . $user->last_name }}
            </h4>
            <p class="mb-0">
                <a href="mailto:{{ $user->email }}"
                   class="@if($user->hasVerifiedEmail()) text-success @endif"
                   @if($user->hasVerifiedEmail())
                   data-toggle="tooltip"
                   data-placement="top"
                   title="Email As Been Verified."
                    @endif>
                    @if($user->hasVerifiedEmail())
                        <i class="fas fa-check-circle"></i>
                    @endif
                    {{ $user->email }}
                </a>
            </p>
            <div class="text-muted font-weight-bolder pb-1">
                @if($user->cellphone_number)
                    <p class="h6 mt-2">
                        <a href="tel:{{ $user->cellphone_number }}"
                           class="btn-link">
                            <i class="fas fa-phone-alt"></i> {{ $user->cellphone_number }}
                        </a>
                    </p>
                @endif
            </div>
            @auth()
                @if(auth()->user()->id == $user->id)
                    <div class="mt-2">
                        @include('components.app.user.change_profile_picture_form')
                    </div>
                @endif
            @endauth
        </div>
        <div class="text-center text-sm-right">
            @foreach($user->roles as $role)
                <span class="badge badge-secondary">
                    {{ $role->name }}
                </span>
            @endforeach
            <div class="text-muted">
                <small>
                    <i class="fas fa-calendar-alt text-primary"></i>
                    Joined {{ date('l d M Y h:ma', strtotime($user->created_at)) }}
                </small>
            </div>
        </div>
    </div>
</div>
