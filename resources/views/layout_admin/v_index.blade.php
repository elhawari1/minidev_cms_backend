<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | @yield('title')</title>

    @include('asset_admin.v_css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        @include('layout_admin.v_navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layout_admin.v_sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
           @yield('content')
        </div>

        {{-- Footer --}}
        @include('layout_admin.v_footer')

    </div>

    @include('asset_admin.v_js')
</body>

</html>
