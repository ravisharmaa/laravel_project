<!DOCTYPE html>
<html>
@include('admin.layout.includes.head')

@stack('extra_styles')
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            @include('admin.layout.includes.header')
<!-- Left side column. contains the logo and sidebar -->
            @include('admin.layout.includes.aside')
<!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        <!-- Content Header (Page header) -->
                @yield('content')
        <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
            @include('admin.layout.includes.footer')
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 2.2.3 -->
        @include('admin.layout.includes.foot_docs')
        @stack('extra-scripts')
</body>
</html>
