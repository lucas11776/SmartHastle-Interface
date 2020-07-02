<form action="{{ url('user') }}"
      method="POST"
      name="update_account">
    @csrf
    @method('PATCH')
    <div class="form-group row">
        <label for="first_name"
               class="col-sm-4 col-form-label">
            First Name <span class="text-danger">*</span>
        </label>
        <div class="col-sm-8">
            <input id="first_name"
                   name="first_name"
                   placeholder="First Name"
                   class="form-control  @error('first_name') is-invalid @enderror"
                   type="text"
                   value="{{ $user->first_name }}">
            @error('first_name')
            <span class="invalid-feedback"
                  role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="last_name"
               class="col-sm-4 col-form-label">
            Last Name <span class="text-danger">*</span>
        </label>
        <div class="col-sm-8">
            <input id="last_name"
                   name="last_name"
                   placeholder="Last Name"
                   class="form-control @error('last_name') is-invalid @enderror"
                   type="text"
                   value="{{ $user->last_name }}">
            @error('last_name')
            <span class="invalid-feedback"
                  role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="email"
               class="col-sm-4 col-form-label">
            Email <span class="text-danger">*</span>
        </label>
        <div class="col-sm-8">
            <div class="input-group"
                  name="verify_account">
                <input type="hidden"
                       name="email"
                       value="{{ old('email') ?? $user->email }}">
                <input id="email"
                       name="email"
                       placeholder="Email address"
                       class="form-control @error('email') is-invalid  @enderror"
                       required="required d-none"
                       type="text"
                       value="{{ $user->email }}"
                       disabled>
                @if(! auth()->user()->hasVerifiedEmail())
                    <div class="input-group-append">
                        <div class="input-group-append">
                            <button class="btn btn-outline-info"
                                    type="button"
                                    id="btn-verify-email"
                                    title="Verify email address."
                                    onclick="event.preventDefault(); document.getElementById('email_verification_form').submit();">
                                <span class="fas fa-link"></span> Send Link.
                            </button>
                        </div>
                    </div>
                @endif
            </div>
            @if(! auth()->user()->hasVerifiedEmail())
                <p class="text-info small mt-1">
                    <i class="fas fa-info-circle"></i> Please verify your email by clicking the Send Link button to get verification link.
                </p>
            @endif
            @error('email')
            <span class="invalid-feedback"
                  role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row d-none">
        <label for="email"
               class="col-sm-4 col-form-label">
            <i class="fas fa-envelope text-primary"></i> Verify email.
        </label>
        <div class="col-sm-8">
            <button type="button"
                    class="btn btn-outline-primary btn-user">
                <i class="fas fa-paper-plane"></i> {{ __('Send link...') }}
            </button>
        </div>
    </div>
    <div class="form-group row">
        <label for="cellphone_number"
               class="col-sm-4 col-form-label">
            Cellphone No.
        </label>
        <div class="col-sm-8">
            <input id="cellphone_number"
                   name="cellphone_number"
                   placeholder="Cellphone number"
                   class="form-control @error('cellphone_number') is-invalid @enderror"
                   type="text"
                   value="{{ old('cellphone_number') ?? $user->cellphone_number }}">
            @error('cellphone_number')
            <span class="invalid-feedback"
                  role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-sm-4 col-sm-8">
            <button name="submit"
                    type="submit"
                    class="btn btn-primary">
                <i class="fas fa-edit"></i> Update
            </button>
        </div>
    </div>
</form>
<form class="d-inline"
      method="POST"
      action="{{ route('verification.resend') }}"
      id="email_verification_form"
      name="email_verification">
    @csrf
</form>
