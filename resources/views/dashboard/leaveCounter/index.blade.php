@extends('layouts.app')

@section('content') 

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('My leave requests') }} <a href="{{ Route('request.index') }}" class="btn btn-primary float-right">My leaves requests</a> <a href="{{ Route('request.create') }}" class="btn btn-primary float-right" style="margin-right: 10px;">Requests</a></div>

                <div class="card-body">
                <table class="table table-bordered table-hover">
            <thead>
                <tr>
                <th rowspan="2">{{ __('Leave type') }}</th>
                <!--
                <th colspan="2" style="text-align: center;">{{ __('Available') }}</th>
                -->
                <th rowspan="2"><i class="mdi mdi-plus-circle" aria-hidden="true"></i>&nbsp;{{ __('Entitled') }}</th>
                <th rowspan="2"><i class="mdi mdi-minus-circle" aria-hidden="true"></i>&nbsp;{{ __('Taken') }}&nbsp;<i class="mdi mdi-help-circle" data-toggle="tooltip" title="" data-original-title="Accepted + Cancellation"></i></th>
                <th rowspan="2"><i class="mdi mdi-information" aria-hidden="true"></i>&nbsp;<span class="label">{{ __('Remaining') }}</span></th>
                <th rowspan="2"><i class="mdi mdi-information" aria-hidden="true"></i>&nbsp;<span class="label label-warning">{{ __('Requested') }}</span></th>
                </tr>
                <!--
                <tr>
                <th>{{ __('actual') }}&nbsp;<i class="mdi mdi-help-circle" data-toggle="tooltip" title="" data-original-title="Entitled - (Accepted + Cancellation)"></i></th>
                <th>{{ __('simulated') }}&nbsp;<i class="mdi mdi-help-circle" data-toggle="tooltip" title="" data-original-title="Entitled - (Accepted + Cancellation + Planned + Requested)"></i></th>
                </tr>
                -->
            </thead>
            <tbody>
         
            <tr>
            @foreach($leaveCounters as $leaveCounter)
                <td>{{ $leaveCounter->leaveType->name }}</td>
                <td>{{ $leaveCounter->total }}   </td>
                <td>{{ $leaveCounter->taken }} </td>
                <td>{{ $leaveCounter->remaining }}</td>
                <td><a href="" target="_blank"></a></td>
                <!--
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                -->  
                    </tr>
                 <tr>
                 @endforeach
            </tr>
      
                        </tbody>
        </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
