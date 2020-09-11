<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Parking | Panel Control</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
     <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
     <!-- iCheck -->
     <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
     <!-- Morris chart -->
     <link rel="stylesheet" href="plugins/morris/morris.css">
     <!-- jvectormap -->
     <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
     <!-- Date Picker -->
     <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
     <!-- Daterange picker -->
     <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
     <!-- bootstrap wysihtml5 - text editor -->
     <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

     <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">

     



      </head>
    <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">

        <header class="main-header">
          <!-- Logo -->
          <a href="/home" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>S</b>PT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">LOGO</span>
          </a>
          <!-- Header Navbar: style can be found in header.less -->
          <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
              <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">

                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-warning">10</span>
                  </a>
                  <ul class="dropdown-menu">
                    <li class="header">You have 10 notifications</li>
                    <li>

                    </li>
                    <li class="footer"><a href="#">View all</a></li>
                  </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="hidden-xs">{{ auth()->user()->name }}</span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <img src="{{ auth()->user()->ruta }}" class="img-circle" alt="User Image">
                      <p>
                       {{ auth()->user()->name }}
                     </p>
                   </li>
                   <!-- Menu Body -->

                   <!-- Menu Footer-->
                   <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Perfil</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout" class="btn btn-default btn-flat">Salir</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->

            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ auth()->user()->ruta }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Usuario:</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
           <li> <a href="/home"> <i class="fa fa-dashboard"></i> <span>  INICIO</span></a></li>
            <li class="active treeview">
              <a href="">
              <i class="fa fa-line-chart"></i><span> Gradiweb parking</span><i class="fa fa-angle-left pull-right"> </i>
            </a>
              <ul class="treeview-menu">
                <li><a href="/vehiculo"><i class="fa fa-circle-o"></i>Administrar Vehiculo</a></li>
                <li><a href="/usuarios"><i class="fa fa-circle-o"></i>Propietarios</a></li>
              </ul>
            </li>
          

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      @yield('content')



      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2020 <a href="http://soportica.com.co">GradiweParking</a>.</strong>Todos los derechos reservados
      </footer>


      <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
       <div class="control-sidebar-bg"></div>
     </div><!-- ./wrapper -->

     <!-- jQuery 2.1.4 -->
     <script src="plugins/jQuery/jquery-3.2.1.min.js"></script>


      <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

     <!-- jQuery UI 1.11.4 -->
     <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
     <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
     <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>

  
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>



    <script src="plugins/fullcalendar/fullcalendar.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"    type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>

    

  
    @yield('scripts')


  </body>
  </html>
