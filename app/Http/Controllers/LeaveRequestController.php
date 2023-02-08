<?php

namespace App\Http\Controllers;
use App\Models\Leave;
use App\Models\LeaveType;
use App\Models\User;
use App\Models\LeaveCounter;
use App\Services\leave\request\LeaveRequestService;

use App\Http\Requests\LeaveRequest\StoreLeaveRequest; 
use App\http\Requests\LeaveRequest\UpdateLeaveRequest;

use Carbon\Carbon;

class LeaveRequestController extends Controller
{
  public $leaveRequestService;

  public function __construct(LeaveRequestService $leaveRequestService){

    $this->leaveRequestService = $leaveRequestService;

  }

  public function index()
  {
    $leaveRequests = Leave::orderBy('created_at')->paginate(5);
    return view('dashboard.leaveRequest.index',compact('leaveRequests'));
  }

  
  public function create()
  {
    $leaveTypes = LeaveType::all();
    $users = User::all();
    return view('dashboard.leaveRequest.create',compact('leaveTypes','users'));
  }

  public function store(StoreLeaveRequest $request)
  { 
    $user = User::find($request->user_id);

   if($this->leaveRequestService->haveLeaveBalance($user,$request))
   {

    $this->leaveRequestService->storeLeaveRequest($request,$user);
     
    toast('Your Request as been sabmited!','success');

    } 
    
    return redirect()->back();
  }


  public function edit($leaveRequests)
  {
    $leaveRequest = Leave::find($leaveRequests);
    $users = User::all();
    $leaveTypes = LeaveType::all();
    return view('dashboard.leaveRequest.edit',compact('leaveRequest','users','leaveTypes'));
  }
  
  public function update(UpdateLeaveRequest $leaveRequests)
  {
    $user = User::find($leaveRequests->user_id);
    $this->leaveRequestService->updateLeaveRequest($leaveRequests,$user); 
    toast('Your Leave Request as been Updated!','success');
    return redirect('leaves/request');
  }

  public function destroy($leaveRequests)
  {
    Leave::destroy($leaveRequest);
    toast('Your Request as been deleted!','success');
    return redirect()->back();
  }

}
