﻿<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Leica Inacap </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('leica/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('leica/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('leica/Ionicons/css/ionicons.min.css') }}" >
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('leica/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('leica/dist/css/skins/_all-skins.min.css') }}" >
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('leica/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('leica/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('leica/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" >
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('leica/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('leica/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" >

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
  <a href="{{route('index')}}" class="logo">
      <span class="logo-lg">Leica Inacap</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Menu</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
      
   
            
          <!-- Notifications: style can be found in dropdown.less -->

          {{-- <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">2</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">mantienes 2 notificaciones</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Debes solicitar activos
                    </a>
                  </li>
                  
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> devolucion pendiente 
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li> --}}


          <!-- Tasks: style can be found in dropdown.less -->
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              {{-- <img src="#" class="user-image" alt="User Image"> --}}
              <span class="hidden-xs">{{ Auth::user()->email }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                {{-- <img src="#" class="img-circle" alt="User Image"> --}}

                <p>
                    {{ Auth::user()->email }}
                  <small>Usuario</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Configuración</a>
                  </div>

                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                    <a class="btn btn-default btn-flat" href="{{ route('logout') }}">
                      Cerrar sesión
                 </a>
                  {{-- <a href="#" class="btn btn-default btn-flat">Salir</a> --}}
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
          <img src="dist/img/nicolas.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->email }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      {{-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="busqueda ...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> --}}
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
          <a href=" {{ route('index') }} ">
        <li class="header">Menu Principal</li>
          </a>
        <li class="active treeview">
            <i class="fa fa-laptop"></i>
            <a href=" {{ route('index') }} ">
             <span>panel de control</span>
            </a>
     
        </li>
     
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Software</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('software.index')}}"><i class="fa fa-circle-o"></i> Softwares</a></li>
            <li><a href="{{route('place_software.index')}}"><i class="fa fa-circle-o"></i> Software por lugar</a></li>
            <li><a href="{{route('software_type.index')}}"><i class="fa fa-circle-o"></i> Tipo de software</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Prestamos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('lending.index')}}"><i class="fa fa-circle-o"></i>Prestamos </a></li>
            <li><a href="{{route('loan_registration.index')}}"><i class="fa fa-circle-o"></i>Registro de Prestamos </a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Inventario</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('place.index')}}"><i class="fa fa-circle-o"></i>Inventario por lugar</a></li>
            <li><a href="{{route('active_input.index')}}"><i class="fa fa-circle-o"></i> Articulos</a></li>
            <li><a href="{{route('inventory.index')}}"><i class="fa fa-circle-o"></i> Inventario</a></li>
            <li><a href="{{route('state.index')}}"><i class="fa fa-circle-o"></i> Estado </a></li>
            <li><a href="{{route('category.index')}}"><i class="fa fa-circle-o"></i> Categoria</a></li>
          
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Mantencion</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              {{-- <li><a href="{{route('maintenance.index')}}"><i class="fa fa-circle-o"></i> Registro de mantenciones</a></li> --}}
            <li><a href="{{route('maintenance_plan.index')}}"><i class="fa fa-circle-o"></i> Plan de Mantencion </a></li>
            <li><a href="{{route('maintenance.index')}}"><i class="fa fa-circle-o"></i> Mantencion </a></li>
            <li><a href="{{route('frequency.index')}}"><i class="fa fa-circle-o"></i> Frecuencia </a></li>
          <li><a href="{{route('priority.index')}}"><i class="fa fa-circle-o"></i> Prioridad </a></li>
          <li><a href="{{route('reason.index')}}"><i class="fa fa-circle-o"></i> Razon </a></li>
          </ul>
        </li>

        <li class="treeview">
            <a href="#">
              <i class="fa fa-book"></i> <span>Plan de estudio</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('career.index')}}"><i class="fa fa-circle-o"></i>Carera </a></li>
            <li><a href="{{route('study_plan.index')}}"><i class="fa fa-circle-o"></i> Planes de estudio </a></li>
            </ul>
          </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Personal</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('liable.index')}}"><i class="fa fa-circle-o"></i>Registro de responsable </a></li>
          <li><a href="{{route('position.index')}}"><i class="fa fa-circle-o"></i> Cargo </a></li>
          </ul>
        </li>

        {{-- <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Listas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i>Lista activo por lugar </a></li>
          {{-- <li><a href="{{route('position.index')}}"><i class="fa fa-circle-o"></i> Cargo </a></li> --}}
          </ul>
        </li> --}}
       
     
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container" style="padding:1%">
      @yield('dentro_de_master')
    </div>

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Leica App
  </footer>

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src=" {{ asset('leica/jquery/dist/jquery.min.js') }}" ></script>
<!-- jQuery UI 1.11.4 -->
<script src=" {{ asset('leica/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('leica/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('leica/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('leica/morris.js/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('leica/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('leica/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('leica/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('leica/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('leica/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('leica/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('leica/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('leica/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('leica/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('leica/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('leica/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('leica/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('leica/dist/js/demo.js') }}"></script>
</body>
</html>