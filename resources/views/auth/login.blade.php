@extends('layouts.app')

@section('content')   
            <div class="login-box" style="margin:10% auto;">
              <div class="login-logo">
              <a href="#"><b> {{ config('app.name', 'Laravel') }}</b></a>
              </div>
              <div class="card"> 
                @if(session('message'))
                <div class="alert alert-danger text-white">
                <strong>{{session('message')}}</strong> 
                </div>
                @endif
                <div class="card-header pb-0 text-start">
                    <h4 class="font-weight-bolder">Sign In</h4>
                    <p class="mb-0">Enter your email and password to sign in</p>
                  </div> 
                <div class="card-body login-card-body"> 
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                    <div class="mb-3"> 

                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                    </div>
                    <div class="mb-3"> 

                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                          @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                    </div> 
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div> 
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                      </div>
                  </form>
                </div> 
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                    <p class="mb-4 text-sm mx-auto">
                      Don't have an account?
                      <a href="{{ route('register') }}" class="text-primary text-gradient font-weight-bold">Sign up</a>
                    </p>
                  </div>
              </div>
            </div>  

@endsection
