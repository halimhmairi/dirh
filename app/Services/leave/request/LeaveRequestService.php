<?php
namespace App\Services\leave\request; 
use App\Models\LeaveCounter;
use Carbon\Carbon;
use App\Models\User; 
use App\Models\Leave; 

class LeaveRequestService implements LeaveRequestInterface
{
   public $leaveCounter ;

    public function __construct()
    {
        $this->leaveCounter = new LeaveCounter();
    }

    public function haveLeaveBalance($user,$leaveRequestInfomation): bool
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

      $leaveCounter->taken = $leaveBalanceRequested;

      $leaveCounter->save(); 
        
    }

    public function updateLeaveRequest($leaveRequests,$user)
    {
      $leave = leave::find($leaveRequests->id);
      
      if($leave->status === "Planned" && $leaveRequests->status !== "Accepted")
      { 
       
          $leaveBalance = diff_date($leave->start_date,$leave->end_date);

          $leaveCounter = $this->leaveCounter->getLeaveTypeByUserAndLeaveType($user,['leave_type_id'=>$leave->leave_type_id]);

          $leaveCounter->taken = $leaveCounter->taken - $leaveBalance;

          $leaveCounter->remaining = $leaveCounter->remaining + $leaveBalance;

          $leaveCounter->save(); 

      };

     $leave->update($leaveRequests->except('id'));

    }

}