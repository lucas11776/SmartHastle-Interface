<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin 2 - Login</title>
    <!-- Custom fonts for this template-->
    <link href="{{ url('assets/dashboard/vendor/fontawesome-free/css/all.min.css') }}"
          rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ url('assets/dashboard/css/sb-admin-2.css') }}"
          rel="stylesheet">
</head>
<body  class="bg-gradient-primary">

<div class="container-fluid">
    <div class="row justify-content-center">
        @yield('content')
    </div>
</div>

@include('components.notification.alert')

<!-- Bootstrap core JavaScript-->
<script src="{{ url('assets/dashboard/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ url('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ url('assets/dashboard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ url('assets/dashboard/js/sb-admin-2.min.js') }}"></script>
</body>
</html>
