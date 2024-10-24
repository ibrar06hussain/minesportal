<!DOCTYPE html>
<html lang="en">
<head>

  <style>
/* Custom CSS for content-wrapper */
        .content-wrappers {
            margin-left: 250px; /* Space for sidebar */
            padding: 20px;
            background-color: #f8f9fa;
            min-height: 100vh; /* Full page height */
        }

  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lease Applications</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('adm/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('adm/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('adm/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('adm/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adm/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('adm/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('adm/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('adm/plugins/summernote/summernote-bs4.min.css')}}">
  <!-- <link rel="stylesheet" href="{{asset('frontend/css/multistep.css')}}"> -->
  @yield('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('adm/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <h5 class="mt-2" style="color:#6c757d;">@if (Auth::check())
            Hello {{ Auth::user()->name }}
        @else
            Please log in.
        @endif</h5>
         <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- Message Start -->
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('adm/dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                </div>
                <div class="col-md-8">
                    <h3 class="dropdown-item-title pt-3 pb-3">
                        @if (Auth::check())
                        {{ Auth::user()->name }}
                    @else
                        <p>Please log in.</p>
                    @endif
                    </h3>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            <!-- Message End -->
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link" target="_blank">
      <img src="{{ asset('adm/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">MICL GB</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adm/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">@if (Auth::check())
             {{ Auth::user()->name }}
        @else
            <p>Please log in.</p>
        @endif</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route("user.applications",["email",Auth::user()->email]) }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                My Applications
                <i class="right fas fa-home"></i>
              </p>
            </a>

            {{-- <ul class="nav nav-treeview">
                <!-- Submenu Item 1 -->
                @foreach (getCompleteUserData() as $key=>$data)
                <li class="nav-item">
                    <a href="/leaseapplications/{{ $data->applicationid}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ $data->name_mineral}} in {{ $data->location}}</p>
                    </a>
                </li>
                @endforeach
                <!-- Submenu Item 2 -->
                <li class="nav-item">
                    <a href="/reports/details" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Detailed Report</p>
                    </a>
                </li>
            </ul> --}}
          </li>

          {{-- <li class="nav-item">
            <a href="/applications/generatechallan/{{ Auth::user()->name }}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Generate Challan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/checklist-reconnaissancelicense" class="nav-link">
              <i class="nav-icon fas  fa-list fa-xs"></i>
              <p>
              Checklists
              </p>
            </a>

            <ol class=" nav nav-treeview">

            <li class="nav-item">
            <a href="/checklist-reconnaissancelicense" class="nav-link">
              <i class="nav-icon fas  fa-solid fa-arrow-right fa-xs"></i>
              <p>
               Reconnaissance License
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/checklist-explorationlicense" class="nav-link">
              <i class="nav-icon fas fa-solid fa-arrow-right fa-xs"></i>
              <p>
               Exploration License
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/checklist-depositretensionlicense" class="nav-link">
              <i class="nav-icon fas fa-solid fa-arrow-right fa-xs"></i>
              <p>
              Mineral Deposit License
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="/checklist-mininglease" class="nav-link">
              <i class="nav-icon fas fa-solid fa-arrow-right fa-xs"></i>
              <p>
               Mining Lease
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="/checklist-depositretensionlicense" class="nav-link">
              <i class="nav-icon fas fa-solid fa-arrow-right  fa-xs"></i>
              <p>
              Registration
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="/checklist-depositretensionlicense" class="nav-link">
              <i class="nav-icon fas fa-solid fa-arrow-right fa-xs"></i>
              <p>
              Gem Stone Minning
              </p>
            </a>
          </li>

      </ol>




          </li>


          <li class="nav-item">
                <a href="{{ route('showmapdata') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Map Data</p>
                </a>
              </li>
              <li class="nav-item">
                {{-- <a href="{{ route('addcoordinates') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Map Coordinates</p>
                </a> --}}
              </li> --}}








          @can('manageUsers','App\Models\User')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                User Management
                <i class="fas fa-users right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrappers d-flex flex-column" style="min-width : 100vh; !important;">
<div class="content flex-grow-1">
  @yield('content')
</div>
</div>
<!-- /.content-wrapper -->
  <footer class="main-footer mt-4">
    <strong>Copyright &copy; 2024-2025 <a href="https://www.gbit.gov.pk">IT DEPARTMENT GB</a>.</strong>
    All rights reserved.

  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('adm/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('adm/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('adm/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('adm/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('adm/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('adm/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('adm/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('adm/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('adm/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('adm/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('adm/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('adm/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('adm/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adm/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adm/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('adm/dist/js/pages/dashboard.js')}}"></script>
<!-- <script src="{{asset('frontend/js/multistep.js')}}"></script> -->
<script>
  $(document).ready(function() {
    $('.content-wrapper').css('min-height', '100vh'); // Set to 100vh
  });
</script>
@yield('js')
@stack('scripts')
</body>
</html>
