@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header">{{ __('Candidates') }}</div>

                <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Candidate username</th>
                      <th scope="col">Job title</th>
                      <th scope="col">Candidate resume</th>
                      <th scope="col">Candidate note</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($candidates as $candidate)
                    <tr>
                      <th scope="row">{{ $candidate->id }}</th>
                      <td>{{ $candidate->user->name }}</td>
                      <td>{{ $candidate->job->title }}</td>
                      <td>{{ $candidate->resume }}</td>
                      <td>{{ Str::words( $candidate->note , 4,'...' ) }}</td>
                      <td>{{ $candidate->status  }}</td>
                      <td>
                      <a class="btn btn-info candidateInfo"><i class="fa fa-eye"></i></a>
                      <a class="btn btn-primary candidateInfo"><i class="fa fa-pencil"></i></a>
                      <a href="{{ Route('candidates.destroy',$candidate) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                    </tr>
                @endforeach
                  </tbody>
                </table>
                <div class="d-flex justify-content-center"> 
                    {{ $candidates->links('pagination.custom') }}
                </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection
