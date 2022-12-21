@extends('layouts.app')

@section('content') 

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('My leave requests') }}</div>

                <div class="card-body">
                <table class="table table-bordered table-hover">
            <thead>
                <tr>
                <th rowspan="2">{{ __('Leave type') }}</th>
                <th colspan="2" style="text-align: center;">{{ __('Available') }}</th>
                <th rowspan="2"><i class="mdi mdi-plus-circle" aria-hidden="true"></i>&nbsp;{{ __('Entitled') }}</th>
                <th rowspan="2"><i class="mdi mdi-minus-circle" aria-hidden="true"></i>&nbsp;{{ __('Taken') }}&nbsp;<i class="mdi mdi-help-circle" data-toggle="tooltip" title="" data-original-title="Accepted + Cancellation"></i></th>
                <th rowspan="2"><i class="mdi mdi-information" aria-hidden="true"></i>&nbsp;<span class="label">{{ __('Planned') }}</span></th>
                <th rowspan="2"><i class="mdi mdi-information" aria-hidden="true"></i>&nbsp;<span class="label label-warning">{{ __('Requested') }}</span></th>
                </tr>
                <tr>
                <th>{{ __('actual') }}&nbsp;<i class="mdi mdi-help-circle" data-toggle="tooltip" title="" data-original-title="Entitled - (Accepted + Cancellation)"></i></th>
                <th>{{ __('simulated') }}&nbsp;<i class="mdi mdi-help-circle" data-toggle="tooltip" title="" data-original-title="Entitled - (Accepted + Cancellation + Planned + Requested)"></i></th>
                </tr>
            </thead>
            <tbody>
                            <tr>
                <td>{{ __('paid leave') }}</td>
                <td>
                    0                </td>
                <td>
                    0                </td>
                <td>21</td>
                <td><a href="" target="_blank">21</a></td>
                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                </tr>
                            <tr>
                <td>{{ __('Sick leave') }}</td>
                <td>
                    4                </td>
                <td>
                    4                </td>
                <td>5</td>
                <td><a href="" target="_blank">1</a></td>
                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                </tr>
                        </tbody>
        </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
