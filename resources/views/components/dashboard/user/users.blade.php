<table class="table table-hover table-responsive-sm bg-white"
       style="line-height: 55px;">
    <thead>
    <tr>
        <th scope="col">#ID</th>
        <th scope="col">Joined</th>
        <th scope="col">Picture</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Last</th>
        <th scope="col">Email</th>
        <th scope="col">Cellphone No.</th>
        <th scope="col">Orders</th>
        <th scope="col">Cart</th>
        <th scope="col">Favorites</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr style="cursor: pointer"
            onclick="event.preventDefault(); location.href = '{{ url('dashboard/users/' . $user->id) }}'">
            <th scope="row">{{ $user->id }}</th>
            <th scope="row">
                <small class="strong">
                    {{ date('l d M Y h:ma', strtotime($user->created_at)) }}
                </small>
            </th>
            <td>
                <img src="{{ $user->image->url }}"
                     style="width: 55px; height: 55px; border-radius: 100%;"
                     class="img-thumbnail border-primary">
            </td>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>
                <a href="mailto:{{$user->email}}">
                    {{ $user->email }}
                </a>
            </td>
            <td>
                <a href="tel:{{$user->cellphone_number}}">
                    {{ $user->cellphone_number ?? '---' }}
                </a>
            </td>
            <td>
                {{ $user->orders->count() }}
            </td>
            <td>
                {{ $user->cart->count() }}
            </td>
            <td>
                ---
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
