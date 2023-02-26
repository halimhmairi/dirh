<?php
namespace App\Services\leave\type; 
use App\Models\LeaveCounter;
use Carbon\Carbon;
use App\Models\User; 
use App\Models\Leave; 

class LeaveTypeService implements LeaveTypeInterface
{

    public function __construct()
    {
    }

    public function availableLeaveTypes($user) : array
    {

     return  $user->leaveCounter->where("remaining" , ">" , 0)->pluck("leave_type_id")->toArray();
       
    }


}