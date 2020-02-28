<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FootWear Management</title>
    <link rel="icon" href="http://www.stu.edu.vn/image.php?src=/uploads/news/98789fc7fe3b1ba8b9039a2244728c9d.png&w=150&aoe=1" type="image/gif" sizes="16x16">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('/template/admin/')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/template/admin/')}}/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('/template/admin/')}}/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/template/admin/')}}/dist/css/AdminLTE.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/template/admin/')}}/dist/css/custom.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('/template/admin/')}}/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <!-- <link rel="stylesheet" href="{{asset('/template/admin/')}}/bower_components/morris.js/morris.css"> -->
    <!-- jvectormap -->
    <!-- <link rel="stylesheet" href="{{asset('/template/admin/')}}/bower_components/jvectormap/jquery-jvectormap.css"> -->
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('/template/admin/')}}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('/template/admin/')}}/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('/template/admin/')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    
    <link rel="stylesheet" href="{{asset('/template/admin/')}}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('/template/admin/')}}/plugins/nouisilder/nouislider.min.css">
    <link rel="stylesheet" href="{{asset('/template/admin/')}}/plugins/nouisilder/nouislider.css">
    <link rel="stylesheet" href="{{asset('/template/admin/')}}/plugins/chartist/chartist.css">
    <link rel="stylesheet" href="{{asset('/template/admin/')}}/plugins/colorpicker/css/colorpicker.css">

    <link rel="stylesheet" href="{{asset('/template/admin/')}}/dist/css/custom.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            color: black;
        }

        a {
            cursor: pointer;
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="{{route('admin.dashboard')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">Foot</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>FootWear</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li>
                        <a style="font-weight: bolder;">Welcome, <i> {{Auth::guard('admin')->user()->username}}</i></a>
                    </li>
                    <li>
                        <a href="{{route('admin.logout')}}" style="font-weight: bolder;">LOGOUT</a>
                    </li>
                </ul>
            </div>
        </nav>


    </header>
    <!-- Left side column. contains the logo and sidebar -->
   @include('admin.menu')

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <footer class="main-footer">
        <strong>FootWear Copyright &copy; 2018.</strong> All rights reserved. By <a href="#">Thái Phạm</a>
    </footer>


    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('/template/admin/')}}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('/template/admin/')}}/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('/template/admin/')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<!-- <script src="{{asset('/template/admin/')}}/bower_components/raphael/raphael.min.js"></script>
<script src="{{asset('/template/admin/')}}/bower_components/morris.js/morris.min.js"></script> -->
<!-- Sparkline -->
<script src="{{asset('/template/admin/')}}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="{{asset('/template/admin/')}}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{asset('/template/admin/')}}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('/template/admin/')}}/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>

<!-- InputMask -->
<script src="{{asset('/template/admin/')}}/plugins/input-mask/jquery.inputmask.js"></script>
<script src="{{asset('/template/admin/')}}/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="{{asset('/template/admin/')}}/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->

<!-- daterangepicker -->
<script src="{{asset('/template/admin/')}}/bower_components/moment/min/moment.min.js"></script>
<script src="{{asset('/template/admin/')}}/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="{{asset('/template/admin/')}}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('/template/admin/')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="{{asset('/template/admin/')}}/plugins/select2/js/select2.js"></script>
<!-- Slimscroll -->
<script src="{{asset('/template/admin/')}}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{asset('/template/admin/')}}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/template/admin/')}}/dist/js/adminlte.min.js"></script>
<script src="{{asset('/template/admin/')}}/dist/js/wNumb.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('/template/admin/')}}/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/template/admin/')}}/dist/js/demo.js"></script>
<script src="{{asset('/template/admin/')}}/plugins/nouisilder/nouislider.js" type="text/javascript"></script>
<script src="{{asset('/template/admin/')}}/plugins/nouisilder/nouislider.min.js" type="text/javascript"></script>
<script src="{{asset('/template/admin/')}}/plugins/chartist/chartist.js" type="text/javascript"></script>
<script src="{{asset('/template/admin/')}}/plugins/colorpicker/js/colorpicker.js" type="text/javascript"></script>
<script src="{{asset('/template/admin/')}}/plugins/colorpicker/js/eye.js" type="text/javascript"></script>
<script src="{{asset('/template/admin/')}}/plugins/colorpicker/js/utils.js" type="text/javascript"></script>


<script>
    $(function () {
        //Datemask dd/mm/yyyy
        $('.datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'});
        $('.select2').select2();
    });

</script>
@yield('script')
@yield('footer')
</body>
</html>
