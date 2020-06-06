<form action="{{ url('user') }}"
      method="POST">
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
            <input type="hidden"
                   name="email"
                   value="{{ $user->email }}">
            <input id="email"
                   name="email"
                   placeholder="Email address"
                   class="form-control @error('email') is-invalid @enderror"
                   required="required"
                   type="text"
                   value="{{ $user->email }}"
                   disabled>
            @error('email')
            <span class="invalid-feedback"
                  role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
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
                   value="{{ $user->cellphone_number }}">
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
