@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('My summary') }}</div>

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
                  </tbody>
                </table> 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
