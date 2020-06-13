<div class="input-group">
    <select type="text"
            class="form-control"
            placeholder="Recipient's username"
            aria-label="Recipient's username"
            aria-describedby="button-addon2">
        @foreach($user->roles()->orderBy('name', 'ASC')->get() as $role)
            <option value="{{ $role->name }}">
                {{ ucfirst($role->name) }}
            </option>
        @endforeach
    </select>
    <div class="input-group-append">
        <button class="btn btn-danger"
                type="button"
                id="button-addon2">
            <i class="fas fa-user-lock"></i>
        </button>
    </div>
</div>
