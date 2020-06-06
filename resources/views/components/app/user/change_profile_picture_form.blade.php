<button class="btn btn-primary"
        type="button"
        onclick="event.preventDefault();document.getElementById('user-profile-input').click()">
    <i class="fa fa-fw fa-camera"></i>
    <span>Change Photo</span>
</button>
<form id="upload-profile-picture-form"
      action="{{ url('user/picture') }}"
      method="POST"
      enctype="multipart/form-data">
    @csrf
    <input id="user-profile-input"
           class="d-none"
           type="file"
           name="image"
           accept="image/jpeg,image/png">
    @error('image')
    <p class="text-danger small">
        {{ $message }}
    </p>
    @enderror
</form>
<script>
    $('#user-profile-input').on('change', function(e) {
        document.getElementById('upload-profile-picture-form').submit();
    });
</script>
