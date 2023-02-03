@extends('layouts.app')

@section('content')


<div class="container"> 
  
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Submit a leave request ') }}</div>

                <div class="card-body"> 

                  <form method="POST" action="{{ Route('request.store') }}">
                      @csrf
                      <div class="form-group">
                        <label for="event_type">{{ __('Leave type') }}</label>
                        <select name="name" class="form-control @error('name') is-invalid @enderror">
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
                          <label for="start_date">{{ __('Start Date') }}</label>
                          <input type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" id="start_date" rows="3" value="{{ old('start_date') }}">
                          @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                          <label for="start_date">{{ __('End Date') }}</label>
                          <input type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" id="start_date" rows="3" value="{{ old('start_date') }}">
                          @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        duration

                        <div class="form-group">
                          <label for="Cause">{{ __('Cause') }}</label>
                          <textarea class="form-control @error('cause') is-invalid @enderror" name="cause" id="cause" rows="3">{{ old('cause') }}</textarea>
                          @error('cause')
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
