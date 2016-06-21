<!DOCTYPE html>
<html>
<head>
<title>@yield('page-title')</title>
  <title>Dashboard</title>
  <script type="text/javascript" src="/angular/angular.min.js"></script>
  <script type="text/javascript" src="/angular/angularApp.js"></script>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" type="text/css" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <link rel="stylesheet" type="text/css" href="plugins/iCheck/flat/_all.css">
  <link rel="stylesheet" href="plugins/select2/select2.min.css" />
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!--font awesome-->
  <link rel="stylesheet" href="/bootstrap/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/purple.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">    
</head>

<body class="hold-transition skin-purple sidebar-mini" ng-app="angularModule">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="{{action('PagesController@maintenance')}}" class="logo" style = "background-color: #e6004c">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">A</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation" style = "background-color:#ff1a66">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu" style = "background-color: #e6004c">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success"></span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have no messages</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>

              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning"></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have no notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->

                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger"></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have no tasks</li>
                  <li>

                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">Admin</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      Alexander Pierce - Web Developer
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>
      <!--ooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Administator</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="{{action('PagesController@search')}}" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <!--ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
          <ul class="sidebar-menu">
            <li class="active">
              <a href="{{action('PagesController@dashboard')}}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Maintenance</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{action('MaintenanceController@flowers')}}"><i class="fa fa-angle-double-right"></i>&nbsp Flowers</a></li>
                <li><a href="{{action('MaintenanceController@bouquets')}}"><i class="fa fa-angle-double-right"></i>&nbsp Bouquet</a></li>
                <li><a href="{{action('MaintenanceController@events')}}"><i class="fa fa-angle-double-right"></i>&nbsp Events</a></li>
                <li><a href=""><i class="fa fa-angle-double-right"></i> Packages</a></li>
                <li><a href="{{action('MaintenanceController@payments')}}"><i class="fa fa-angle-double-right"></i>&nbsp Payment Method</a></li>
                <li><a href="{{action('MaintenanceController@markups')}}"><i class="fa fa-angle-double-right"></i>&nbsp Markup</a></li>
                <li><a href="{{action('MaintenanceController@suppliers')}}"><i class="fa fa-angle-double-right"></i>&nbsp Supplier</a></li>
                <li><a href="{{action('MaintenanceController@employees')}}"><i class="fa fa-angle-double-right"></i>&nbsp Employee</a></li>
                <li><a href="{{action('MaintenanceController@items')}}"><i class="fa fa-angle-double-right"></i>
                &nbsp Other Products</a></li>
              </ul>
            </li><li class="treeview">
              <a href="#">
                <i class="fa fa-archive"></i>
                <span>Inventory Maintenace</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
               <li  {{{ (Request::is('inventory') ? 'class=active' : '') }}}><a href="{{action('InventoryController@showinventory')}}"><i class="fa fa-angle-double-right"></i>&nbsp Inventory</a></li>
               <li><a href="{{action('PagesController@transfer')}}"><i class="fa fa-angle-double-right"></i>
                &nbsp Transfers</a></li>
              </ul>
            </li>
            <li>
              <a href="{{action('PagesController@calendar')}}">
                <i class="fa fa-calendar"></i> <span>Scheduling</span>
              </a>
            </li> 
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>


	@yield('body')
	

</body>

  <script src="links/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="bootstrap/js/bootstrap.min.js"></script>

  <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
 
  <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>

  <script src="plugins/iCheck/icheck.js"></script>

  <script src="links/select2.min.js"></script>

  <!-- jQuery UI 1.11.4 -->
  <script type="text/javascript" src="links/jquery-ui-git.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Morris.js charts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

  <script type="text/javascript" src="links/moment.js"></script>

  <script type="text/javascript" src="plugins/daterangepicker/daterangepicker.css"></script>
  <!-- Sparkline -->
  <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>

  <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/knob/jquery.knob.js"></script>
  <!-- daterangepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>

  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="plugins/fastclick/fastclick.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/app.min.js"></script>

  <script src="dist/js/demo.js"></script>

  @yield('footer')

</html>