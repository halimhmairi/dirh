@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('My leave Request') }} <a class="btn btn-primary" style="float:right;" href="{{ Route('request.create') }}"><i class="fa fa-plus"></i></a></div>

                <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">{{ __('Start date') }}</th>
                      <th scope="col">{{ __('End date') }}</th>  
                      <th scope="col">{{ __('Type') }}</th>  
                      <th scope="col">{{ __('Status') }}</th>  
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($leaveRequests as $leaveRequest)
                  <tr>
                <td>{{ $leaveRequest->id }}</td>
                <td>{{ $leaveRequest->start_date }}</td>
                <td>{{ $leaveRequest->end_date }}</td>
                <td>{{ $leaveRequest->leaveType->name }}</td>
                <td><x-user-status :type="status_color($leaveRequest->status)" :message="$leaveRequest->status"/></td>
                <td>
                <a href="{{ Route('request.edit',$leaveRequest->id) }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                      <a href="{{ Route('request.destroy',$leaveRequest->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>
                </tr>
                @endforeach
                  </tbody>
                </table> 
                <div class="d-flex justify-content-center"> 
                    {{ $leaveRequests->links('pagination.custom') }}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
