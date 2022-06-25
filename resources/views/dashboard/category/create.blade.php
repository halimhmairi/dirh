@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
  <div class="col-md-6">
      <div class="card">
          <div class="card-header">{{ __('Add Category') }}</div>

          <div class="card-body"> 
    <form method="POST" action="{{ Route('category/store') }}">
        @csrf
        <div class="form-group">
          <label for="name">Category name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="Category name">
        </div>

        <div class="form-group">
            <label for="description">Category description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3">{{ old('description') }}</textarea>
          </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
