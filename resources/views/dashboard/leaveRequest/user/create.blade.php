@extends('layouts.app')

@section('content')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/leave/request/style.css') }}">
@endpush

<div class="container"> 
  
<div class="row justify-content-right">

    <div class="col-md-3">
            <div class="card"> 

                <div class="card-body"> 
                {{ __('Review our Employee Leave Policies') }}
                </div>
           </div>
    </div> 

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Submit a leave request ') }}</div>

                <div class="card-body">   

                  <form method="POST" action="{{ Route('request.user.store') }}">
                      @csrf

                      @can('is_admin')
                      <div class="form-group">
                        <label for="user_id">{{ __('Users') }}</label>
                        <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                            @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                            </select>
                        @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
                      @endcan

                    <div class="form-group">
                    <label for="leave_type_id">{{ __('Leave type') }}</label>

                    <div class="row"> 
                    @foreach($leaveTypes as $leaveType)

                    <div class="col-6 mt-3"> 
                    <div @class([
                                'dirh-input-custom-box',
                                'dirh-input-custom-box-disabled' => $leaveType->active
                          ]) id="dirh-input-custom-box-{{ $leaveType->id }}">

                    <input @class(["dirh-input-custom",
                             "dirh-input-custom-radio",
                             "dirh-input-custom-radio-disabled" => $leaveType->active ,
                     ]) id="dirh-input-custom-radio-{{ $leaveType->id }}" type="radio" value="{{ $leaveType->id }}"  name="leave_type_id" />
                       <div class="dirh-input-custom dirh-input-custom-description"> <span style="font-weight: bold">{{ $leaveType->name }} ({{  $leaveType->total }}/{{  $leaveType->remaining }})</span><br>{{ $leaveType->description }}</div>
                    </div>
                    </div>

                    @endforeach
                    

                    </div>
                    </div>
                    <hr> 

                      <div class="form-group">
                          <label for="start_date">{{ __('Start Date') }}</label>
                          <input type="datetime-local" class="form-control @error('start_date') is-invalid @enderror" name="start_date" id="start_date" rows="3" value="{{ old('start_date') }}">
                          @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                      </div>

                        <div class="form-group">
                          <label for="end_date">{{ __('End Date') }}</label>
                          <input type="datetime-local" class="form-control @error('end_date') is-invalid @enderror" name="end_date" id="end_date" rows="3" value="{{ old('end_date') }}">
                          @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div> 

                        <div class="form-group">
                          <label for="reason">{{ __('Reason') }}</label>
                          <textarea class="form-control @error('reason') is-invalid @enderror" name="reason" id="reason" rows="3">{{ old('reason') }}</textarea>
                          @error('reason')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                    </div>
        </div>
        </div>
        </div>

        <script>

            $(".dirh-input-custom-box").click(function(){
               var avalableLeaveTypesIds = {!! json_encode($avalableLeaveTypesIds) !!} 
               var leaveTypesids = {!! json_encode($leaveTypes->pluck("id")) !!}  

                $radioInput = this.closest('.dirh-input-custom-radio') 
                $thisElement = this

                id =  $thisElement.getAttribute('id')
                className =  $thisElement.getAttribute('class') 

                idRadioInput = $("#"+id).children(".dirh-input-custom-radio").attr('id')

                valueRadioInput = Number($("#"+id).children(".dirh-input-custom-radio").attr('value'))

                if(avalableLeaveTypesIds.indexOf(valueRadioInput) === -1) 
                { 
                    return ;
                }


                $(".dirh-input-custom-radio").removeAttr("checked") 
                $("#"+idRadioInput).attr("checked","checked")  

               $(".dirh-input-custom-box").removeClass("dirh-input-custom-radio-active")  

               $("#"+id).addClass("dirh-input-custom-radio-active")  
               

            });

        </script>

@endsection
