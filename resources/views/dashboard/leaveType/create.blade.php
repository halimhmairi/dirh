@extends('layouts.app')

@section('content')


<div class="container"> 
  
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create a leave type ') }}</div>

                <div class="card-body"> 

                  <form method="POST" action="{{ Route('types.store') }}">
                      @csrf
                      <div class="form-group">
                        <label for="event_type">{{ __('Type name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="Type leave name">
                        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div> 

                        <div class="form-group">
                          <label for="description">{{ __('description') }}</label>
                          <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3">{{ old('description') }}</textarea>
                          @error('description')
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
