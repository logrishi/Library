<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>LMS | @yield('heading')</title>

    {{-- <link href="/css/jquery-ui.min.css" rel="stylesheet"> --}}
    <!-- Bootstrap -->
    <link href="/css/jquery-ui.min.css" rel="stylesheet">
    <link href="/theme/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/theme/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/theme/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/theme/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="/theme/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="/theme/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="/theme/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/theme/build/css/custom.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="/home" class="site_title"><i class="fa fa-paw"></i> <span>IMS</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="/theme/production/images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>@if (Auth::check()){{ Auth::user()->name }}
                                @else <h2>Guest</h2>
                                @endif
                            </h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    @yield('sidebar')
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            @yield('topbar')
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">

                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                                @yield('heading')
                            </h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-info" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    @yield('content')
                </div>
            </div>

            <!-- /page content -->
            <!-- footer content -->
            @yield('footer')
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <!-- resources\js\app.js -->
    {{-- //REACT/ Vue --}}
    {{-- <script src='https://unpkg.com/v-calendar@next'></script> --}}
    <script src="/js/app.js"></script>
    {{-- //REACT/ Vue --}}
    {{-- <script src="/js/moment.js"></script> --}}
    {{-- <script src="/js/issue.js"></script> --}}
    {{-- <script>
        $(function() {
        $(".datepicker").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
      });
      });
    </script> --}}
    <script>
        $('.dropdown-toggle').dropdown()
    </script>
    <script src="/theme/vendors/jquery/dist/jquery.min.js"></script>
    <script src="/js/jquery-ui-1.11.4.min.js"></script>
    <!-- Bootstrap -->
    <script src="/theme/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="/theme/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/theme/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="/theme/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="/theme/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="/theme/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="/theme/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="/theme/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="/theme/vendors/Flot/jquery.flot.js"></script>
    <script src="/theme/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="/theme/vendors/Flot/jquery.flot.time.js"></script>
    <script src="/theme/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="/theme/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="/theme/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="/theme/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="/theme/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="/theme/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="/theme/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="/theme/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="/theme/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="/theme/vendors/moment/min/moment.min.js"></script>
    {{-- <script src="/theme/vendors/bootstrap-daterangepicker/daterangepicker.js"></script> --}}

    <!-- Custom Theme Scripts -->
    <script src="/theme/build/js/custom.min.js"></script>

</body>

</html>