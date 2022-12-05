<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('backend/images/favicon.ico')}}">

    <title>Emart Admin - Dashboard</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{asset('backend/css/vendors_css.css')}}">

    <!-- Style-->
    <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/skin_color.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/toaster.css')}}">

</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">

        @include('admin.body.header')

        <!-- Left side column. contains the logo and sidebar -->
        @include('admin.body.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">
                <!-- Main content -->
                @yield('admin')
                <!-- /.content -->
            </div>
        </div>
        <!-- /.content-wrapper -->
        @include('admin.body.footer')


        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->


    <!-- Vendor JS -->
    <script src="{{asset('backend/js/vendors.min.js')}}"></script>
    <script src="{{asset('../assets/icons/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
    <script src="{{asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
    <script src="{{asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
	<script src="{{asset('../assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js')}}"></script>
    <script src="{{asset('../assets/vendor_components/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('backend/js/pages/data-table.js')}}"></script>
	<script src="{{asset('../assets/vendor_components/ckeditor/ckeditor.js')}}"></script>
	<script src="{{asset('../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js')}}"></script>
	<script src="{{asset('backend/js/pages/editor.js')}}"></script>
	<script src="{{asset('../assets/vendor_components/select2/dist/js/select2.full.js')}}"></script>
	<script src="{{asset('backend/js/pages/advanced-form-element.js')}}"></script>
    <!-- Sunny Admin App -->
    <script src="{{asset('backend/js/template.js')}}"></script>
    <script src="{{asset('backend/js/pages/dashboard.js')}}"></script>
    <script src="{{asset('backend/js/toaster.min.js')}}"></script>
    <!-- Sweet Alert Link -->
    <script src="{{asset('backend/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('backend/js/sweetalert.js')}}"></script>
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch (type) {

            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
        @endif
    </script>
</body>

</html>