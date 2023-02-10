<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title> 

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

    <!-- Styles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <div  class="wrapper" id="app">

      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
      </div>

        @guest
      
         @else
            <x-InfoModal type="danger" :data="34" />  
             @include('sweetalert::alert')

           <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"> {{ config('app.name', 'Laravel') }}</span>
      </a> 
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>  
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @can('is_user')  
          <li class="nav-item">
          <a class="nav-link {{ Request::is('category') ? 'active' : '' }}" href="{{ route('category') }}">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
              {{ __('Category Management') }}
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li> 
          @endif
          @can('is_admin')
          <li class="nav-item {{ Request::is('accounts/*') ? 'menu-is-opening menu-open' : '' }}">
           <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              {{__('Account manager')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
          <li class="nav-item">
           <a class="nav-link {{ Request::is('accounts/role') ? 'active' : '' }}" href="{{ route('role.index') }}">
           <i class="nav-icon fa-solid fa-user-lock"></i> 
              <p>
                {{ __('Role') }}
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li> 
          <li class="nav-item">
              <a class="nav-link {{ Request::is('accounts/user') ? 'active' : '' }}" href="{{ route('user.index') }}">

              <i class="nav-icon fa-solid fa-user-alt"></i> 
              <p>
              {{ __('User') }}
              </p>
            </a>
          </li>
          </ul>

          <li class="nav-item  {{ Request::is('company/*') ? 'menu-is-opening menu-open' : '' }}">
          <a href="#" class="nav-link">
              <i class="nav-icon fa-solid fa-building"></i>
              <p>
              {{__('Company Management')}}
                <i class="right fas fa-angle-left"></i>

              </p>
            </a>
          <ul class="nav nav-treeview">
          <li class="nav-item">
          <a class="nav-link {{ Request::is('company/department') ? 'active' : '' }}" href="{{ route('department.index') }}">
              <i class="nav-icon fa-solid fa-building-user"></i>
              <p>
              {{ __('Department') }}  
              </p>
            </a> 
          </li>
        </ul>

          <li class="nav-item">
           <a href="#" class="nav-link {{ Request::is('leaves/types') ? 'active' : '' }}">
              <i class="right fas fa-angle-left"></i>
              <i class="nav-icon fa-solid fa-building-user"></i>

              <p>
              {{__('Leave manager')}}
                
              </p>
            </a>
          <ul class="nav nav-treeview">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('leaves/types') ? 'active' : '' }}" href="{{ route('types.index') }}">
              <i class="nav-icon far fa-envelope"></i>
              <p>
              {{ __('Leave Type') }} 
              </p>
            </a> 
          </li>
          <li class="nav-item">
           <a class="nav-link {{ Request::is('leaves/request') ? 'active' : '' }}" href="{{ route('request.index') }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
              {{ __('Leave Request') }} 
              </p>
            </a>  
          </li>
         </ul>
          @endif   

          <li class="nav-item">
           <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              {{__('Recruitment')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             <li class="nav-item">
              <a class="nav-link {{ Request::is('jobs') ? 'active' : '' }}" href="{{ route('jobs') }}">
                  <i class="nav-icon far fa-calendar-alt"></i>
                  <p>
                  {{ __('Jobs') }}
                    <span class="badge badge-info right">2</span>
                  </p>
                </a>
              </li> 

             <li class="nav-item">
              <a class="nav-link {{ Request::is('candidates') ? 'active' : '' }}" href="{{ route('candidates') }}">
                  <i class="nav-icon far fa-calendar-alt"></i>
                  <p>
                  {{ __('Candidates') }}
                    <span class="badge badge-info right">2</span>
                  </p>
                </a>
            </li> 
           </ul>
            <li class="nav-item">
            <a class="nav-link {{ Request::is('leaves/counters') ? 'active' : '' }}" href="{{ route('counters.index') }}">
                  <i class="nav-icon far fa-calendar-alt"></i>
                  <p>
                  {{ __('Leave summary') }}
                    <span class="badge badge-info right">2</span>
                  </p>
                </a>
            </li> 
             
        </ul>

        <div class="sidenav-footer mx-3 "> 
                            <a class="btn btn-primary btn-sm mb-0 w-100  mb-3" href="{{ Route('profile/edit') }}"
                            type="button">Settings
                           </a>
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();"  class="btn btn-dark btn-sm w-100">
                                          {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                          @csrf
                                      </form>

                                   
                          </div>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
                                   
       @endguest  
                    <main class="main-content"> 
                        @yield('content')
                    </main>
                </div> 

          <!-- jQuery -->
          <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
          <!-- jQuery UI 1.11.4 -->
          <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
          <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
          <script>
            $.widget.bridge('uibutton', $.ui.button)
          </script>
          <!-- Bootstrap 4 -->
          <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
          <!-- ChartJS -->
          <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
          <!-- Sparkline -->
          <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
          <!-- JQVMap -->
          <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
          <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
          <!-- jQuery Knob Chart -->
          <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
          <!-- daterangepicker -->
          <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
          <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
          <!-- Tempusdominus Bootstrap 4 -->
          <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
          <!-- Summernote -->
          <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
          <!-- overlayScrollbars -->
          <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
          <!-- AdminLTE App -->
          <script src="{{ asset('dist/js/adminlte.js') }}"></script>
          <!-- AdminLTE for demo purposes 
          <script src="{{ asset('dist/js/demo.js') }}"></script> -->
          <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
          <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
</body>
</html>
