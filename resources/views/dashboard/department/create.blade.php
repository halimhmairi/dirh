@extends('layouts.app')

@section('content')

<div class="container"> 
  
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add department') }}</div>

                <div class="card-body"> 

                  <form method="POST" action="{{ Route('department.store') }}">
                      @csrf
                      <div class="form-group">
                        <label for="name">department name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="department name">
                        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>

                      <div class="form-group">
                          <label for="location">department location</label>
                          <textarea class="form-control @error('location') is-invalid @enderror" name="location" id="location" rows="3">{{ old('location') }}</textarea>
                          @error('location')
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
