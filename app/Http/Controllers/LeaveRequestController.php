<?php

namespace App\Http\Controllers;
use App\Models\Leave;
use App\Models\LeaveType;
use App\Models\User;
use App\Models\LeaveCounter;
use App\Services\leave\request\LeaveRequestService;
use App\Services\leave\type\LeaveTypeService;

use App\Http\Requests\LeaveRequest\StoreLeaveRequest; 
use App\http\Requests\LeaveRequest\UpdateLeaveRequest;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class LeaveRequestController extends Controller
{
  public $leaveRequestService;

  public function __construct(LeaveRequestService $leaveRequestService,LeaveTypeService $leaveTypeService){

    $this->leaveRequestService = $leaveRequestService;
    
    $this->leaveTypeService = $leaveTypeService;

  }

  public function index()
  {
    $leaveRequests = Leave::orderBy('created_at')->paginate(5);
    return view('dashboard.leaveRequest.index',compact('leaveRequests'));
  } 

  public function create()
  { 

    $users = User::where('id',Auth::user()->id)->get();
    $leaveTypes = LeaveType::LeaveTypesAndCounterByUser(Auth::user()->id);  

      $users = User::all();

      $avalableLeaveTypesIds =  $this->leaveTypeService->availableLeaveTypes(Auth::user());

       $leaveTypes = LeaveType::all()->map(function ($item) use($avalableLeaveTypesIds){
     
        $item->active = in_array($item->id , $avalableLeaveTypesIds)?  true  :  true  ;

        return $item;
      });  
   
    return view('dashboard.leaveRequest.create',compact('leaveTypes','users','avalableLeaveTypesIds'));
  }

  public function store(StoreLeaveRequest $request)
  { 

    $user = User::find($request->user_id);

   if($this->leaveRequestService->haveLeaveBalance($user,$request))
   {

    $this->leaveRequestService->storeLeaveRequest($request,$user);
     
    toast(__('messages.Your leave request has been submitted!'),'success');

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
    toast(__('messages.Your leave request has been updated!'),'success');
    return redirect('leaves/request');
  }


  public function avalableLeaveTypesByUser($userId)
  {
    $avalableLeaveTypesIds =  $this->leaveTypeService->availableLeaveTypesByUser(User::find($userId));
    return response()->json([
      "leaveTypes"=>$avalableLeaveTypesIds
    ]);
  }


  public function destroy($leaveRequests)
  {
    Leave::destroy($leaveRequest);
    toast(__('messages.Your leave request has been deleted!'),'success');
    return redirect()->back();
  }

}
