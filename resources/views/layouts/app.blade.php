<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title> 

  <!-- Font Awesome pour les icônes -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

  <!-- Tailwind CSS -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  
  <!-- Toastr pour les notifications -->
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">

  @stack('styles')

</head>
<body style="background-color: #f0f1f3;">

    <div class="wrapper"> 

        @guest
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <a class="nav-link active" href="{{ Route(config('app.name').'.jobs.jobs') }}">{{ __('Jobs') }}</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="{{ Route('login') }}">{{ __('Login') }}</a>
          </li> 
        </ul>
         @else
            <x-InfoModal type="danger" :data="34" />  
             @include('sweetalert::alert')


                      <!-- Navbar -->
          <nav class="fixed top-0 left-64 right-0 bg-white shadow-md z-30 border-b border-gray-200">
            <div class="flex items-center justify-between px-6 py-3">
              
              <!-- Left section - Menu Toggle (Mobile) -->
              <div class="flex items-center gap-4">
                <button onclick="toggleSidebar()" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
                  <i class="fas fa-bars text-gray-600"></i>
                </button>
              </div>

              <!-- Right section - Notifications -->
              <div class="flex items-center gap-2">
                
                <!-- Search Button -->
                <button onclick="toggleSearch()" class="p-2 rounded-lg hover:bg-gray-100 transition-colors relative">
                  <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                  </svg>
                </button>

                <!-- Messages Dropdown -->
                <div class="relative">
                  <button onclick="toggleDropdown('messagesDropdown')" class="p-2 rounded-lg hover:bg-gray-100 transition-colors relative">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    <span class="absolute top-0 right-0 inline-flex items-center justify-center px-1.5 py-0.5 text-xs font-bold text-white bg-red-500 rounded-full">3</span>
                  </button>
                  
                  <!-- Messages Dropdown Menu -->
                  <div id="messagesDropdown" class="hidden absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-xl border border-gray-200 overflow-hidden">
                    <div class="px-4 py-3 bg-gray-50 border-b border-gray-200">
                      <p class="text-sm font-semibold text-gray-700">3 Messages</p>
                    </div>
                    <div class="max-h-96 overflow-y-auto">
                      <!-- Message 1 -->
                      <a href="#" class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 transition-colors border-b border-gray-100">
                        <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="w-12 h-12 rounded-full object-cover">
                        <div class="flex-1 min-w-0">
                          <div class="flex items-center justify-between mb-1">
                            <h4 class="text-sm font-semibold text-gray-900">Brad Diesel</h4>
                            <i class="fas fa-star text-red-500 text-xs"></i>
                          </div>
                          <p class="text-sm text-gray-600 truncate">Call me whenever you can...</p>
                          <p class="text-xs text-gray-400 mt-1">
                            <i class="far fa-clock mr-1"></i>Il y a 4 heures
                          </p>
                        </div>
                      </a>
                      <!-- Message 2 -->
                      <a href="#" class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 transition-colors border-b border-gray-100">
                        <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="w-12 h-12 rounded-full object-cover">
                        <div class="flex-1 min-w-0">
                          <div class="flex items-center justify-between mb-1">
                            <h4 class="text-sm font-semibold text-gray-900">John Pierce</h4>
                            <i class="fas fa-star text-gray-400 text-xs"></i>
                          </div>
                          <p class="text-sm text-gray-600 truncate">I got your message bro</p>
                          <p class="text-xs text-gray-400 mt-1">
                            <i class="far fa-clock mr-1"></i>Il y a 4 heures
                          </p>
                        </div>
                      </a>
                      <!-- Message 3 -->
                      <a href="#" class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 transition-colors border-b border-gray-100">
                        <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="w-12 h-12 rounded-full object-cover">
                        <div class="flex-1 min-w-0">
                          <div class="flex items-center justify-between mb-1">
                            <h4 class="text-sm font-semibold text-gray-900">Nora Silvester</h4>
                            <i class="fas fa-star text-yellow-500 text-xs"></i>
                          </div>
                          <p class="text-sm text-gray-600 truncate">The subject goes here</p>
                          <p class="text-xs text-gray-400 mt-1">
                            <i class="far fa-clock mr-1"></i>Il y a 4 heures
                          </p>
                        </div>
                      </a>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-center border-t border-gray-200">
                      <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-800">Voir tous les messages</a>
                    </div>
                  </div>
                </div>

                <!-- Notifications Dropdown -->
                <div class="relative">
                  <button onclick="toggleDropdown('notificationsDropdown')" class="p-2 rounded-lg hover:bg-gray-100 transition-colors relative">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    <span class="absolute top-0 right-0 inline-flex items-center justify-center px-1.5 py-0.5 text-xs font-bold text-white bg-yellow-500 rounded-full">15</span>
                  </button>
                  
                  <!-- Notifications Dropdown Menu -->
                  <div id="notificationsDropdown" class="hidden absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-xl border border-gray-200 overflow-hidden">
                    <div class="px-4 py-3 bg-gray-50 border-b border-gray-200">
                      <p class="text-sm font-semibold text-gray-700">15 Notifications</p>
                    </div>
                    <div class="max-h-96 overflow-y-auto">
                      <!-- Notification 1 -->
                      <a href="#" class="flex items-center justify-between px-4 py-3 hover:bg-gray-50 transition-colors border-b border-gray-100">
                        <div class="flex items-center gap-3">
                          <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-envelope text-blue-600"></i>
                          </div>
                          <span class="text-sm text-gray-700">4 nouveaux messages</span>
                        </div>
                        <span class="text-xs text-gray-400">Il y a 3 min</span>
                      </a>
                      <!-- Notification 2 -->
                      <a href="#" class="flex items-center justify-between px-4 py-3 hover:bg-gray-50 transition-colors border-b border-gray-100">
                        <div class="flex items-center gap-3">
                          <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-users text-green-600"></i>
                          </div>
                          <span class="text-sm text-gray-700">8 demandes d'amis</span>
                        </div>
                        <span class="text-xs text-gray-400">Il y a 12h</span>
                      </a>
                      <!-- Notification 3 -->
                      <a href="#" class="flex items-center justify-between px-4 py-3 hover:bg-gray-50 transition-colors border-b border-gray-100">
                        <div class="flex items-center gap-3">
                          <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-file text-purple-600"></i>
                          </div>
                          <span class="text-sm text-gray-700">3 nouveaux rapports</span>
                        </div>
                        <span class="text-xs text-gray-400">Il y a 2 jours</span>
                      </a>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-center border-t border-gray-200">
                      <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-800">Voir toutes les notifications</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </nav>

           <!-- Main Sidebar Container -->
   <aside class="fixed left-0 top-0 h-screen w-64 bg-gradient-to-b from-gray-800 to-gray-900 shadow-2xl z-40 overflow-y-auto">
    <!-- Brand Logo -->
      <a href="/" class="flex items-center gap-3 px-6 py-4 border-b border-gray-700 hover:bg-gray-700 transition-colors">
        <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center shadow-lg">
          <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
          </svg>
        </div>
        <span class="text-white font-semibold text-lg">{{ config('app.name', 'Laravel') }}</span>
      </a> 
    <!-- Sidebar -->
    <div class="flex flex-col h-[calc(100vh-80px)]">
      <!-- Sidebar user panel -->
      <div class="px-6 py-4 border-b border-gray-700">
        <div class="flex items-center gap-3">
          <img src="{{ asset('avatar/'.Auth::user()->avatar) }}" 
               class="w-12 h-12 rounded-full object-cover ring-2 ring-blue-500 shadow-lg" 
               alt="User Image">
          <div class="flex-1 min-w-0">
            <p class="text-white font-medium text-sm truncate">{{ Auth::user()->name }}</p>
            <p class="text-gray-400 text-xs truncate">{{ Auth::user()->position }}</p>
        </div>
        </div>
      </div>  
      <!-- Sidebar Menu -->
      <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
        
        <!-- @can('is_admin')   -->
          <!-- Category Management -->
          <a href="{{ route('category') }}" 
             class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ Request::is('category') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
            </svg>
            <span class="flex-1 font-medium">{{ __('Category Management') }}</span>
          </a> 

          
          <!-- Account Manager -->
          <div class="space-y-1">
            <button onclick="toggleMenu('accountMenu')" 
                    class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all w-full {{ Request::is('accounts/*') ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
              </svg>
              <span class="flex-1 text-left font-medium">{{__('Account manager')}}</span>
              <svg id="accountMenuIcon" class="w-5 h-5 transition-transform {{ Request::is('accounts/*') ? 'rotate-90' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
              </svg>
            </button>
            <div id="accountMenu" class="pl-4 space-y-1 {{ Request::is('accounts/*') ? '' : 'hidden' }}">
              <a href="{{ route('role.index') }}" 
                 class="flex items-center gap-3 px-4 py-2.5 rounded-lg transition-all {{ Request::is('accounts/role') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
                <span class="font-medium">{{ __('Role') }}</span>
              </a>
              <a href="{{ route('user.index') }}" 
                 class="flex items-center gap-3 px-4 py-2.5 rounded-lg transition-all {{ Request::is('accounts/user') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                <span class="font-medium">{{ __('User') }}</span>
              </a>
            </div>
          </div>

          <!-- Company Manager -->
          <div class="space-y-1">
            <button onclick="toggleMenu('companyMenu')" 
                    class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all w-full {{ Request::is('company/*') ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
              </svg>
              <span class="flex-1 text-left font-medium">{{ __('Company manager') }}</span>
              <svg id="companyMenuIcon" class="w-5 h-5 transition-transform {{ Request::is('company/*') ? 'rotate-90' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
              </svg>
            </button>
            <div id="companyMenu" class="pl-4 space-y-1 {{ Request::is('company/*') ? '' : 'hidden' }}">
              <a href="{{ route('department.index') }}" 
                 class="flex items-center gap-3 px-4 py-2.5 rounded-lg transition-all {{ Request::is('company/department') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
                <span class="font-medium">{{ __('Department') }}</span>
              </a>
            </div>
          </div>

          <!-- Leave Manager -->
          <div class="space-y-1">
            <button onclick="toggleMenu('leaveMenu')" 
                    class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all w-full {{ Request::is('leaves/*') ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
              </svg>
              <span class="flex-1 text-left font-medium">{{ __('Leave manager') }}</span>
              <svg id="leaveMenuIcon" class="w-5 h-5 transition-transform {{ Request::is('leaves/*') ? 'rotate-90' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
              </svg>
            </button>
            <div id="leaveMenu" class="pl-4 space-y-1 {{ Request::is('leaves/*') ? '' : 'hidden' }}">
              <a href="{{ route('types.index') }}" 
                 class="flex items-center gap-3 px-4 py-2.5 rounded-lg transition-all {{ Request::is('leaves/types') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                </svg>
                <span class="font-medium">{{ __('Leave Type') }}</span>
              </a>
              <a href="{{ route('request.index') }}" 
                 class="flex items-center gap-3 px-4 py-2.5 rounded-lg transition-all {{ Request::is('leaves/request') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <span class="flex-1 font-medium">{{ __('Leave Request') }}</span>
                @if($global['leavePlanned'] > 0)
                <span class="px-2 py-0.5 text-xs font-bold bg-red-500 text-white rounded-full">{{ $global['leavePlanned'] }}</span>
                @endif
              </a>
              <a href="{{ route('settings.index') }}" 
                 class="flex items-center gap-3 px-4 py-2.5 rounded-lg transition-all {{ Request::is('leaves/settings') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span class="font-medium">{{ __('Settings') }}</span>
              </a>
            </div>
          </div>


          <!-- Recruitment -->
          <div class="space-y-1">
            <button onclick="toggleMenu('recruitmentMenu')" 
                    class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all w-full {{ Request::is('recruitments/*') ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
              </svg>
              <span class="flex-1 text-left font-medium">{{__('Recruitment')}}</span>
              <svg id="recruitmentMenuIcon" class="w-5 h-5 transition-transform {{ Request::is('recruitments/*') ? 'rotate-90' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
              </svg>
            </button>
            <div id="recruitmentMenu" class="pl-4 space-y-1 {{ Request::is('recruitments/*') ? '' : 'hidden' }}">
              <a href="{{ route('jobs.index') }}" 
                 class="flex items-center gap-3 px-4 py-2.5 rounded-lg transition-all {{ Request::is('recruitments/jobs') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <span class="flex-1 font-medium">{{ __('Jobs') }}</span>
                <span class="px-2 py-0.5 text-xs font-bold bg-cyan-500 text-white rounded-full">2</span>
              </a>
              <a href="{{ route('candidates.index') }}" 
                 class="flex items-center gap-3 px-4 py-2.5 rounded-lg transition-all {{ Request::is('recruitments/candidates') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                <span class="flex-1 font-medium">{{ __('Candidates') }}</span>
                <span class="px-2 py-0.5 text-xs font-bold bg-cyan-500 text-white rounded-full">2</span>
              </a>
            </div>
          </div>

          <!-- @endif   -->
          
          <!-- Leave Summary -->
          <a href="{{ route('counters.index') }}" 
             class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ Request::is('leaves/counters') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
            </svg>
            <span class="flex-1 font-medium">{{ __('Leave summary') }}</span>
            <span class="px-2 py-0.5 text-xs font-bold bg-cyan-500 text-white rounded-full">2</span>
          </a>

          <!-- Training -->
          <a href="{{ route('training.index') }}" 
             class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ Request::is('training') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
            <span class="flex-1 font-medium">{{ __('Training') }}</span>
            <span class="px-2 py-0.5 text-xs font-bold bg-red-500 text-white rounded-full">2</span>
          </a>

          <!-- Historical -->
          <a href="{{ route('counters.index') }}" 
             class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ Request::is('historical') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
            <span class="flex-1 font-medium">{{ __('Historical') }}</span>
            <span class="px-2 py-0.5 text-xs font-bold bg-cyan-500 text-white rounded-full">2</span>
          </a>

      </nav>
      
      <!-- Footer avec boutons -->
      <div class="border-t border-gray-700 p-4 space-y-2 bg-gray-900">
        <a href="{{ Route('profile/edit') }}" 
           class="flex items-center justify-center gap-2 w-full py-2.5 px-4 bg-gray-700 hover:bg-gray-600 text-white font-medium rounded-lg transition-all shadow-sm">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
          </svg>
          Settings
                           </a>
                            <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  
           class="flex items-center justify-center gap-2 w-full py-2.5 px-4 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-all shadow-sm">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
          </svg>
                                          {{ __('Logout') }}
                                        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                          @csrf
                                      </form>
    </div>
  </aside>
                                   
       @endguest  
                    <main class="ml-64 mt-16"> 
                        @yield('content')
                    </main>
                </div> 

  <!-- Scripts essentiels -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  
  <!-- SweetAlert2 pour les alertes -->
  <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}" defer></script>
  
  <!-- Toastr pour les notifications -->
  <script src="{{ asset('plugins/toastr/toastr.min.js') }}" defer></script>

  <!-- Script pour toggle des menus et dropdowns -->
  <script>
  // Toggle des menus sidebar
  function toggleMenu(menuId) {
    const menu = document.getElementById(menuId);
    const icon = document.getElementById(menuId + 'Icon');
    
    if (menu.classList.contains('hidden')) {
      menu.classList.remove('hidden');
      icon.classList.add('rotate-90');
    } else {
      menu.classList.add('hidden');
      icon.classList.remove('rotate-90');
    }
  }

  // Toggle des dropdowns de notification
  function toggleDropdown(dropdownId) {
    const dropdown = document.getElementById(dropdownId);
    const allDropdowns = document.querySelectorAll('[id$="Dropdown"]');
    
    // Fermer tous les autres dropdowns
    allDropdowns.forEach(d => {
      if (d.id !== dropdownId) {
        d.classList.add('hidden');
      }
    });
    
    // Toggle le dropdown cliqué
    dropdown.classList.toggle('hidden');
  }

  // Fonction pour la recherche (placeholder)
  function toggleSearch() {
    alert('Fonctionnalité de recherche - À implémenter');
  }

  // Fonction pour toggle sidebar sur mobile
  function toggleSidebar() {
    const sidebar = document.querySelector('aside');
    sidebar.classList.toggle('hidden');
  }

  // Fermer les dropdowns en cliquant à l'extérieur
  document.addEventListener('click', function(event) {
    const isDropdownButton = event.target.closest('[onclick^="toggleDropdown"]');
    const isDropdownContent = event.target.closest('[id$="Dropdown"]');
    
    if (!isDropdownButton && !isDropdownContent) {
      const allDropdowns = document.querySelectorAll('[id$="Dropdown"]');
      allDropdowns.forEach(d => d.classList.add('hidden'));
    }
  });
  </script>

  <script defer>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
  }); 
  </script>

  @stack('scripts')

</body>
</html>
