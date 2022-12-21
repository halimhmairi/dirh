@extends('layouts.app')

@section('content')

<div class="container"> 
  
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add role') }}</div>

                <div class="card-body"> 

                  <form method="POST" action="{{ Route('role/store') }}">
                      @csrf
                      <div class="form-group">
                        <label for="name">Role name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="Role name">
                      </div>

                      <div class="form-group">
                          <label for="description">Role description</label>
                          <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3">{{ old('description') }}</textarea>
                        </div>

                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                    </div>
        </div>
        </div>
        </div>
@endsection
