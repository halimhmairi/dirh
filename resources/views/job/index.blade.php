@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center"> 

    @foreach($jobs as $job)
    <div class="col-sm-8">
        <div class="card">
        <div class="card-body">
            <h1 class="card-title">{{$job->title}}</h1>
            <p class="card-text">{{$job->jobsummary}}</p> 
            <x-badge :badges="$job->tags" /> 
        </div>
        <div class="card-footer">
      <small class="text-muted">Publish {{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}</small>

  
      
      <a href="{{ Route(config('app.name').'.jobs.show',$job) }}" class="btn btn-primary float-right">Go somewhere</a>
    </div>
        </div>
    </div>
    @endforeach 
</div>

<div class="d-flex justify-content-center"> 
  {{ $jobs->links('pagination.custom') }}
</div>
</div>


@endsection