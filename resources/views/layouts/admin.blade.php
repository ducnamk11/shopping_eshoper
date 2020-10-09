<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> @yield('title')</title>
    <link rel="stylesheet" href="{{asset('/assets/admin/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/admin/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/admin/dist/css/style.css')}}">

    @yield('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('partials.header')
    @include('partials.sidebar')
    @yield('content')
    @include('partials.footer')
</div>
<script src="{{asset('/assets/admin/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/assets/admin/plugins/boostrap/js/boostrap.js')}}"></script>
<script src="{{asset('/assets/admin/dist/js/adminlte.min.js')}}"></script>
@yield('js')
</body>
</html>
w
