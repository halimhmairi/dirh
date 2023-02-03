@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('My leave Types') }} <a class="btn btn-primary" style="float:right;" href="{{ Route('types.create') }}"><i class="fa fa-plus"></i></a></div>

                <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">{{ __('Type') }}</th>
                      <th scope="col">{{ __('Description') }}</th>  
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($types as $type)
                  <tr>
                <td>{{ $type->id }}</td>
                <td>{{ $type->name }}</td>
                <td>{{ $type->description }}</td>
                <td>
                <a href="{{ Route('types.edit',$type->id) }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                      <a href="{{ Route('types.destroy',$type->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>
                </tr>
                @endforeach
                  </tbody>
                </table> 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
