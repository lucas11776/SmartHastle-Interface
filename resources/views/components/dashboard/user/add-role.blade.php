@inject('role', App\Role)
<form class="input-group"
      method="POST"
      action="{{ url('user/' . $user->id . '/role') }}">
    @csrf
    <select type="text"
            name="role"
            class="form-control"
            placeholder="Add user role."
            aria-label="Add user role."
            aria-describedby="button-addon2">
        @foreach($role::orderBy('name', 'ASC')->get() as $role)
            <option value="{{ $role->name }}">
                {{ ucfirst($role->name) }}
            </option>
        @endforeach
    </select>
    <div class="input-group-append">
        <button class="btn btn-success"
                type="submit"
                id="button-addon2">
            <i class="fas fa-user-plus"></i>
        </button>
    </div>
</form>
