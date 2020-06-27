<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token"
          content="{{ csrf_token() }}">
    <meta name="description"
          content="">
    <meta name="author"
          content="Themba Lucas Ngubeni">
    <title>
        {{ $title ?? env('APP_NAME') . ' Dashboard' }}
    </title>
    <!-- Custom fonts for this template-->
    <link href="{{ url('assets/dashboard/vendor/fontawesome-free/css/all.min.css') }}"
          rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ url('assets/dashboard/css/sb-admin-2.css') }}"
          rel="stylesheet">
    <link rel="stylesheet"
          type="text/css"
          href="{{ url('assets/app/styles/cart.css') }}">
    <link rel="stylesheet"
          type="text/css"
          href="{{ url('assets/app/styles/cart_responsive.css') }}">

    <!-- Bootstrap core JavaScript-->
    <script src="{{ url('assets/dashboard/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</head>
<body id="page-top sidebar-toggled">

<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Make Footer Stick In Bottom -->
    <div style="min-height: 100vh;"></div>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            @include('dashboard.components.navbar')
            <!-- Begin Page Content -->
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        @include('dashboard.components.footer')
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

@include('components.notification.alert')

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<!-- Core plugin JavaScript-->
<script src="{{ url('assets/dashboard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ url('assets/dashboard/js/sb-admin-2.min.js') }}"></script>

</body>
</html>
