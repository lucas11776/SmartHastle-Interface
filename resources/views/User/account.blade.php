@extends('layouts.app')
@section('content')
    <div class="super_container">
        <!-- Header -->
        @extends('components.app.header')
        <div class="super_container_inner">
            @extends('components.app.menu')
            <div class="super_overlay"></div>

            @include('components.app.footer')
        </div>
    </div>
@endsection
