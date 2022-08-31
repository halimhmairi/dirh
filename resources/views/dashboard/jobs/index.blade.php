@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Jobs') }} <a href="{{ Route('jobs/create') }}" class="btn btn-primary" style="float: right;"><i class="fa fa-plus"></i></a></div>

                <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Job title</th>
                      <th scope="col">Job summary</th> 
                      <th scope="col">tags</th>
                      <th scope="col">publish date</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($jobs as $job) 
                    <tr>
                      <th scope="row">{{ $job->id }}</th>
                      <td>{{ $job->title  }}</td>
                      <td>{{ Str::words( $job->jobsummary , 4, ' ...') }}</td> 
                      <td>{{ $job->tags }}</td>
                      <td>{{ $job->publish_at }}</td>
                      <td>
                      <a href="{{ Route('jobs/edit',$job->id) }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                      <a href="{{ Route('jobs/destroy',$job) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                    </tr>
                @endforeach
                  </tbody>
                </table>
                <div class="d-flex justify-content-center"> 
                    {{ $jobs->links('pagination.custom') }}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
 

@endsection
