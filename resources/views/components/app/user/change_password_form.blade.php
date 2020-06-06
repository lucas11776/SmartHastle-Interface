<form action="{{ url('user') }}"
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
                   placeholder="Old password"
                   class="form-control here"
                   type="text">
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
                   class="form-control here"
                   type="text">
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
                   class="form-control here"
                   required="required"
                   type="text">
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
