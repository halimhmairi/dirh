@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-4">
            <div class="card">
                <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                    <p class="mb-0">Edit Profile</p> 
                </div>
                </div>
                <div class="card-body">
                <p class="text-uppercase text-sm">{{ __('Edit ') }} {{ $user->name }}</p>
                <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('profile/update') }}">
                        @csrf 
                 
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Username</label>
                        <input class="form-control" name="name" type="text"  class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Email address</label> 
                        <input id="email" type="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                   
                    
                
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Submit') }}
                            </button>
                        </div>

                  </form>
                </div>
                <hr class="horizontal dark">
                <p class="text-uppercase text-sm">{{ __('Edit password') }}</p>
             
                    <form method="POST" action="{{ route('profile/updatePassword') }}">
                        @csrf
                    <div class="col-md-12">
                    <div class="form-group">
                        <label for="oldPassword" class="form-control-label">Old password</label>
                        <input id="oldPassword" type="password" class="form-control @error('oldPassword') is-invalid @enderror" name="oldPassword" required autocomplete="new-password">
                        @error('oldPassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    </div>
                    <div class="col-md-12">
                    <div class="form-group">
                        <label for="newPassword" class="form-control-label">new password</label>
                        <input id="newPassword" type="password" class="form-control @error('newPassword') is-invalid @enderror" name="newPassword" required autocomplete="new-password">
                        @error('newPassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    </div> 
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </div>
                    </form>
                </div> 
                </div>
            </div>
        </div> 
      </div> 
    </div>
  </div> 
@endsection
