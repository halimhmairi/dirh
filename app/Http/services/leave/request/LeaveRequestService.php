<?php
namespace App\Http\services\leave\request; 
use App\Models\LeaveCounter;
use Carbon\Carbon;
use App\Models\User; 
use App\Models\Leave; 

class LeaveRequestService 
{
   public $leaveCounter ;

    public function __construct(LeaveCounter $leaveCounter)
    {
        $this->leaveCounter = new LeaveCounter();
    }

    public function haveLeaveBalance($user,$leaveRequestInfomation)
    {
       
         $leaveCounterRequested =  diff_date($leaveRequestInfomation['start_date'],$leaveRequestInfomation['end_date']);
     
         $leaveCounterBalance = $this->leaveCounter->getLeaveTypeByUserAndLeaveType($user,$leaveRequestInfomation);
    
         if($leaveCounterBalance->remaining  < $leaveCounterRequested)
         {
           return false;
         }

         return true;
    }


    public function storeLeaveRequest($request,$user)
    {

      Leave::create($request->all());  

      $leaveBalanceRequested =  diff_date($request->start_date,$request->end_date);

      $leaveCounter =  $this->leaveCounter
      ->getLeaveTypeByUserAndLeaveType($user,$request->all());

      $leaveCounter->remaining = $leaveCounter->remaining - $leaveBalanceRequested;

      $leaveCounter->save(); 
        
    }

}