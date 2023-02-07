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
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
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
        <div class="main-header navbar navbar-expand navbar-white navbar-light">
       
          
            <div class="row">
              <div class="col-12">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
                  <div class="container-fluid"> 
                    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon mt-2">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                      </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                      <ul class="navbar-nav mx-auto">  
                        <!-- Authentication Links -->
                        @if (Route::has('register'))
                        <li class="nav-item">
                          <a class="nav-link me-2" href="{{ Route('register') }}">
                            <i class="fa fa-user-circle opacity-6 text-dark me-1"></i>
                            Sign Up
                          </a>
                        </li>
                        @endif
                        @if (Route::has('login'))
                        <li class="nav-item">
                          <a class="nav-link me-2" href="{{ Route('login') }}">
                            <i class="fa fa-key opacity-6 text-dark me-1"></i>
                            Sign In
                          </a>
                        </li>
                        @endif
                      </ul>
                      <ul class="navbar-nav d-lg-block d-none">
                        <li class="nav-item">
                          <a href="https://github.com/halimhmairi/argon-2-dashboard-laravel-9" class="btn btn-sm mb-0 me-1 btn-primary">Free Download</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </nav>
                <!-- End Navbar -->
              </div>
            </div>
          </div> 
                        @else
                        <x-InfoModal type="danger" :data="34" /> 

                        @if(Request::is('profile/edit'))
                        <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
                          <span class="mask bg-primary opacity-6"></span>
                        </div>
                        @else
                        <div class="min-height-300 bg-primary position-absolute w-100"></div>
                        @endif
                        <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 ps" id="sidenav-main">
                          <div class="sidenav-header">
                            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
                            <a class="navbar-brand m-0"  href="{{ url('/home') }}" target="_blank">
                              <img src="{{ asset('img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
                              <span class="ms-1 font-weight-bold">  {{ config('app.name', 'Laravel') }}</span>
                            </a>
                          </div> 
                          
                          <hr class="horizontal dark mt-0">
                          <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
                            <ul class="navbar-nav">
                              @can('is_user')
                                <li class="nav-item">
                                  <a class="nav-link {{ Request::is('category') ? 'active' : '' }}" href="{{ route('category') }}">
                                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                      <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                                    </div>
                                    <span class="nav-link-text ms-1">{{ __('Category Management') }}</span>
                                  </a>
                                </li> 
                              @endif
                             @can('is_admin')
                              <li class="nav-item mt-3">
                                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account manager</h6>
                              </li> 
                               <li class="nav-item">
                                 <a class="nav-link {{ Request::is('role') ? 'active' : '' }}" href="{{ route('role') }}">
                                   <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                     <i class="ni ni-support-16 text-danger text-sm opacity-10"></i>
                                   </div>
                                   <span class="nav-link-text ms-1">{{ __('Role Management') }}</span>
                                 </a>
                               </li> 
                               <li class="nav-item">
                                 <a class="nav-link {{ Request::is('user') ? 'active' : '' }}" href="{{ route('user') }}">
                                   <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                     <i class="ni ni-user-run text-danger text-sm opacity-10"></i>
                                   </div>
                                   <span class="nav-link-text ms-1">{{ __('User Management') }}</span>
                                 </a>
                               </li> 
                               <li class="nav-item">
                                 <a class="nav-link {{ Request::is('department') ? 'active' : '' }}" href="{{ route('department') }}">
                                   <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                     <i class="ni ni-user-run text-danger text-sm opacity-10"></i>
                                   </div>
                                   <span class="nav-link-text ms-1">{{ __('Department Management') }}</span>
                                 </a>
                               </li> 
                               <li class="nav-item">
                                 <a class="nav-link {{ Request::is('leaves/types') ? 'active' : '' }}" href="{{ route('types.index') }}">
                                   <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                     <i class="ni ni-user-run text-danger text-sm opacity-10"></i>
                                   </div>
                                   <span class="nav-link-text ms-1">{{ __('Leave Type Management') }}</span>
                                 </a>
                               </li> 
                               <li class="nav-item">
                                 <a class="nav-link {{ Request::is('leaves/request') ? 'active' : '' }}" href="{{ route('request.index') }}">
                                   <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                     <i class="ni ni-user-run text-danger text-sm opacity-10"></i>
                                   </div>
                                   <span class="nav-link-text ms-1">{{ __('Leave Request Management') }}</span>
                                 </a>
                               </li> 
                            @endcan  
                            <li class="nav-item mt-3">
                              <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Recruitment</h6>
                            </li> 
                            <li class="nav-item">
                              <a class="nav-link {{ Request::is('jobs') ? 'active' : '' }}" href="{{ route('jobs') }}">
                                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                  <i class="ni ni-key-25 text-danger text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">{{ __('Jobs') }}</span>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link {{ Request::is('candidates') ? 'active' : '' }}" href="{{ route('candidates') }}">
                                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                  <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">{{ __('Candidates') }}</span>
                              </a>
                            </li> 
                            <li class="nav-item">
                              <a class="nav-link {{ Request::is('leaves/counters') ? 'active' : '' }}" href="{{ route('counters.index') }}">
                                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                  <i class="ni ni-book-bookmark text-success text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">{{ __('Leave summary') }}</span>
                              </a>
                            </li>  
                            </ul>
                          </div>
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
                        </aside>

                     
                   @include('sweetalert::alert')
                                   
                                    @endguest 
                    <main class="main-content">
                      @if (!Request::is('profile/edit'))
                      @include('layouts/topbar');
                 @endif
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
