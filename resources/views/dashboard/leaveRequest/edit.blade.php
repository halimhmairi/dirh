@extends('layouts.app')

@section('content')


<div class="container"> 
  
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit a leave request ') }}</div>

                <div class="card-body"> 

                  <form method="POST" action="{{ Route('request.update') }}">
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

                      <input type="hidden" name="id" value="{{ $leaveRequest->id }}">

                      <div class="form-group">
                          <label for="start_date">{{ __('Start Date') }}</label>
                          <input type="datetime-local" class="form-control @error('start_date') is-invalid @enderror" name="start_date" id="start_date" rows="3" value="{{ $leaveRequest->start_date }}">
                          @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                      </div>

                        <div class="form-group">
                          <label for="end_date">{{ __('End Date') }}</label>
                          <input type="datetime-local" class="form-control @error('end_date') is-invalid @enderror" name="end_date" id="end_date" rows="3" value="{{ $leaveRequest->end_date }}">
                          @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        duration

                        <div class="form-group">
                          <label for="reason">{{ __('Reason') }}</label>
                          <textarea class="form-control @error('reason') is-invalid @enderror" name="reason" id="reason" rows="3">{{ $leaveRequest->reason }}</textarea>
                          @error('reason')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                          <label for="status">{{ __('Status') }}</label>
                          <select class="form-control @error('status') is-invalid @enderror" name="status">
                            <option>Cancelled</option>
                            <option>Rejected</option>
                            <option>Accepted</option>
                            <option>Pnanned</option>
                          </select>
                        </div>

                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                    </div>
        </div>
        </div>
        </div>

@endsection
