@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pb-5"> 
    <div class="col-sm-8">
        <div class="card">
        <div class="card-body">
            <h1 class="card-title">{{$job->title}}</h1>
            <p class="card-text">{{$job->jobsummary}}</p> 
            <p class="card-text">{{$job->description}}</p> 
            <span class="badge badge-primary">Primary</span>
            <span class="badge badge-secondary">Secondary</span>
            <span class="badge badge-success">Success</span>
            <span class="badge badge-danger">Danger</span>
            <span class="badge badge-warning">Warning</span> 
        </div>
        <div class="card-footer">
      <small class="text-muted">Last updated 3 mins ago</small>
      
      <a href="#" class="btn btn-primary float-right">Apply</a>
    </div>
        </div>
    </div>
  
</div> 
</div>
@endsection