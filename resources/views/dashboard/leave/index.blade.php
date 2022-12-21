@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('My leave requests') }}</div>

                <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">{{ __('Start date') }}</th>
                      <th scope="col">{{ __('End date') }}</th> 
                      <th scope="col">{{ __('Reason') }}</th>
                      <th scope="col">{{ __('Duration') }}</th>
                      <th scope="col">{{ __('Type') }}</th>
                      <th scope="col">{{ __('Status') }}</th>
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
