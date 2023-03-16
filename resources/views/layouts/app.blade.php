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

    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
 
  @stack('styles')

</head>
<body class="hold-transition sidebar-mini layout-fixed" style="background-color: #f0f1f3;">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <div  class="wrapper"> 

        @guest
      
         @else
            <x-InfoModal type="danger" :data="34" />  
             @include('sweetalert::alert')


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
              <!-- Navbar Search -->
              <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                  <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                  <form class="form-inline">
                    <div class="input-group input-group-sm">
                      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                      <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                          <i class="fas fa-search"></i>
                        </button>
                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </li>

              <!-- Messages Dropdown Menu -->
              <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="far fa-comments"></i>
                  <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                      <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                      <div class="media-body">
                        <h3 class="dropdown-item-title">
                          Brad Diesel
                          <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">Call me whenever you can...</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                      </div>
                    </div>
                    <!-- Message End -->
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                      <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                      <div class="media-body">
                        <h3 class="dropdown-item-title">
                          John Pierce
                          <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">I got your message bro</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                      </div>
                    </div>
                    <!-- Message End -->
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                      <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                      <div class="media-body">
                        <h3 class="dropdown-item-title">
                          Nora Silvester
                          <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">The subject goes here</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                      </div>
                    </div>
                    <!-- Message End -->
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
              </li>
              <!-- Notifications Dropdown Menu -->
              <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="far fa-bell"></i>
                  <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <span class="dropdown-item dropdown-header">15 Notifications</span>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
              </li> 
            </ul>
          </nav>

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
          <img src="{{ asset('avatar/'.Auth::user()->avatar) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>  
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        @can('is_admin')  
          <li class="nav-item">
          <a class="nav-link {{ Request::is('category') ? 'active' : '' }}" href="{{ route('category') }}">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
              {{ __('Category Management') }}
              </p>
            </a>
          </li> 
          
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
              {{ __('Company manager') }}
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

          <li class="nav-item {{ Request::is('leaves/*') ? 'menu-is-opening menu-open' : '' }}">
           <a href="#" class="nav-link">
              <i class="right fas fa-angle-left"></i>
              <i class="nav-icon fa-solid fa-building-user"></i> 
              <p>
              {{ __('Leave manager') }}
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
              <span class="badge badge-danger right">{{ $global['leavePlanned'] }}</span>
              </p>
            </a>  
          </li>
         </ul>
      

          <li class="nav-item  {{ Request::is('recruitments/*') ? 'menu-is-opening menu-open' : '' }}">
           <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              {{__('Recruitment')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             <li class="nav-item">
              <a class="nav-link {{ Request::is('recruitments/jobs') ? 'active' : '' }}" href="{{ route('jobs.index') }}">
                  <i class="nav-icon fa-sharp fa-solid fa-business-time"></i>
                  <p>
                  {{ __('Jobs') }}
                    <span class="badge badge-info right">2</span>
                  </p>
                </a>
              </li> 

             <li class="nav-item">
              <a class="nav-link {{ Request::is('recruitments/candidates') ? 'active' : '' }}" href="{{ route('candidates.index') }}">
                  <i class="nav-icon fa-solid fa-user-tie"></i>
                  <p>
                  {{ __('Candidates') }}
                    <span class="badge badge-info right">2</span>
                  </p>
                </a>
            </li> 
           </ul>
           @endif  
            <li class="nav-item">
            <a class="nav-link {{ Request::is('leaves/counters') ? 'active' : '' }}" href="{{ route('counters.index') }}">
                  <i class="nav-icon far fa-calendar-alt"></i>
                  <p>
                  {{ __('Leave summary') }}
                    <span class="badge badge-info right">2</span>
                  </p>
                </a>
            </li> 
             
        </ul><br><br>

        <div class="sidenav-footer mx-3 "> 
                            <a class="btn btn-secondary btn-sm mb-0 w-100 text-white mb-3" href="{{ Route('profile/edit') }}"
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
                    <main class="main-content" style="margin-top: 5%;padding-left: 10%;"> 
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

          <!-- SweetAlert2 -->
          <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
  

          <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
          <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>

        <!-- Toastr -->
        <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>  

          <script>
          $(function() {
            var Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });

           $('#description').summernote()

          }); 

         </script>

  @stack('scripts')

</body>
</html>
