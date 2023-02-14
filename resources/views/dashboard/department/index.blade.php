@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('department') }} <a href="{{ Route('department.create') }}" class="btn btn-primary" style="float: right;"><i class="fa fa-plus"></i></a></div>

                <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">department Name</th>
                      <th scope="col">department Location</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($departments as $department)
                    <tr>
                      <th scope="row">{{ $department->id }}</th>
                      <td>{{ $department->name }}</td>
                      <td>{{ $department->location }}</td>
                      <td>
                      <a href="{{ Route('department.edit',$department->id) }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                      <a href="{{ Route('department.destroy',$department->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                    </tr>
                @endforeach
                  </tbody>
                </table>
                <div class="d-flex justify-content-center"> 
                    {{ $departments->links('pagination.custom') }}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
 

@endsection
