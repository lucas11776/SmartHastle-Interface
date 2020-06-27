<form action="{{ url('user/change/password') }}"
      method="POST">
    @csrf
    @method('PATCH')
    <div class="form-group row">
        <label for="old_password"
               class="col-sm-4 col-form-label">
            Current Password
        </label>
        <div class="col-sm-8">
            <input id="old_password"
                   name="old_password"
                   placeholder="Current password"
                   class="form-control here @error('old_password') is-invalid @enderror"
                   type="password"
                   required>
        </div>
    </div>
    <div class="form-group row">
        <label for="password"
               class="col-sm-4 col-form-label">
            Password
        </label>
        <div class="col-sm-8">
            <input id="password"
                   name="password"
                   placeholder="New password"
                   class="form-control here @error('password') is-invalid @enderror"
                   type="password"
                   required>
        </div>
    </div>
    <div class="form-group row">
        <label for="password_confirmation"
               class="col-sm-4 col-form-label">
            Password Confirmation
        </label>
        <div class="col-sm-8">
            <input id="password_confirmation"
                   name="password_confirmation"
                   placeholder="Confirm password"
                   class="form-control here @error('password_confirmation') is-invalid @enderror"
                   type="password"
                   required>
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-sm-4 col-sm-8">
            <button name="submit"
                    type="submit"
                    class="btn btn-primary">
                <i class="fas fa-refresh"></i> Change Password
            </button>
        </div>
    </div>
</form>
