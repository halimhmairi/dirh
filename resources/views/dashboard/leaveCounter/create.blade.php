@extends('layouts.app')

@section('content')


<div class="container"> 
  
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Submit a leave Counte To User ') }}</div>

                <div class="card-body"> 

                  <form method="POST" action="{{ Route('counters.store') }}">
                      @csrf

                      <div class="form-group">
                        <label for="user_id">{{ __('Users') }}</label>
                        <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                            @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                            </select>
                        @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
                      
                      <div class="form-group">
                        <label for="leave_type_id">{{ __('Leave type') }}</label>
                        <select name="leave_type_id" class="form-control @error('leave_type_id') is-invalid @enderror">
                            @foreach($leaveTypes as $leaveType)
                            <option value="{{ $leaveType->id }}">{{ $leaveType->name }}</option>
                            @endforeach
                            </select>
                        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div> 

                      <div class="form-group">
                          <label for="total">{{ __('Total') }}</label>
                          <input type="number" class="form-control @error('total') is-invalid @enderror" name="total" id="total" rows="3" value="{{ old('total') }}">
                          @error('total')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                      </div>  

                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                    </div>
        </div>
        </div>
        </div>

@endsection
