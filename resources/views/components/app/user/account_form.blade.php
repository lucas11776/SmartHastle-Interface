<form action="{{ url('user') }}"
      method="POST">
    @csrf
    @method('PATCH')
    <div class="form-group row">
        <label for="name"
               class="col-sm-4 col-form-label">
            First Name
        </label>
        <div class="col-sm-8">
            <input id="name"
                   name="Name"
                   placeholder="First Name"
                   class="form-control here"
                   type="text"
                   value="{{ $user->first_name }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="lastname"
               class="col-sm-4 col-form-label">
            Last Name
        </label>
        <div class="col-sm-8">
            <input id="lastname"
                   name="Surname"
                   placeholder="Last Name"
                   class="form-control here"
                   type="text"
                   value="{{ $user->last_name }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="email"
               class="col-sm-4 col-form-label">
            Email *
        </label>
        <div class="col-sm-8">
            <input id="email"
                   name="email"
                   placeholder="Email address"
                   class="form-control here"
                   required="required"
                   type="text"
                   value="{{ $user->email }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="text"
               class="col-sm-4 col-form-label">
            Cellphone No. *
        </label>
        <div class="col-sm-8">
            <input id="text"
                   name="text"
                   placeholder="Cellphone number"
                   class="form-control"
                   type="text"
                   value="{{ $user->cellphone_number }}">
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
