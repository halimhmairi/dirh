<?php
use Carbon\Carbon;

if(!function_exists('diff_date')){

    function diff_date($start_date,$end_date)
    {
        $start_date = Carbon::parse($start_date); 
        return $start_date->diffInDays($end_date);
    }

}

if(!function_exists('status_color')){
 
    function status_color($status)
    {
      $statusColor = 
      [
        'active'=>'success','blocked'=>'danger',
        'waiting'=>'secondary',
        'Cancelled'=>'danger','Planned'=>'secondary',
        'Rejected'=>'danger','Accepted'=>'success'
      ];
      return $statusColor[$status]; 
    }

}

if(!function_exists('toast')){
 
    function toast($message, $type = 'success')
    {
        session()->flash($type, $message);
    }

}

