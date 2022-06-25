<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title> 

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="g-sidenav-show   bg-gray-100">
    <div id="app">
        @guest
        <div class="container position-sticky z-index-sticky top-0">
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
                               <li class="nav-item">
                                 <a class="nav-link {{ Request::is('role') ? 'active' : '' }}" href="{{ route('role') }}">
                                   <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                     <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                                   </div>
                                   <span class="nav-link-text ms-1">{{ __('Role Management') }}</span>
                                 </a>
                               </li> 
                               <li class="nav-item">
                                 <a class="nav-link {{ Request::is('user') ? 'active' : '' }}" href="{{ route('user') }}">
                                   <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                     <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                                   </div>
                                   <span class="nav-link-text ms-1">{{ __('User Management') }}</span>
                                 </a>
                               </li> 
                            @endcan    
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

                        @if (!Request::is('profile/edit'))
                             @include('layouts/topbar');
                        @endif

                   @include('sweetalert::alert')
                                   
                                    @endguest 
                    <main class="main-content">
                        @yield('content')
                    </main>
                </div> 

                <script>
                  var win = navigator.platform.indexOf('Win') > -1;
                  if (win && document.querySelector('#sidenav-scrollbar')) {
                    var options = {
                      damping: '0.5'
                    }
                    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
                  }
                </script>
                <!-- Github buttons -->
                <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>
