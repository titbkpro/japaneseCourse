<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Japanese Course</title>

    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Custom styling plus plugins -->
    <link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">

    @yield('head-part')
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">

        <!-- side-bar navigation -->
        @includeIf('admin.layouts.admin-side-bar')
        <!-- /side-bar navigation -->

        <!-- top navigation -->
        @includeIf('admin.layouts.admin-top-nav')
        <!-- /top navigation -->

        <!-- page content -->
        @yield('content-part')
        <!-- /page content -->

        <!-- footer content -->
        @includeIf('admin.layouts.admin-footer')
        <!-- /footer content -->
    </div>
</div>

@yield('modal-part')
@yield('other-part')

<!-- jQuery -->
<script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('vendors/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('vendors/nprogress/nprogress.js') }}"></script>
<!-- FullCalendar -->
<script src="{{ asset('vendors/moment/min/moment.min.js') }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset('build/js/custom.min.js') }}"></script>

@yield('script-part')

</body>
</html>
