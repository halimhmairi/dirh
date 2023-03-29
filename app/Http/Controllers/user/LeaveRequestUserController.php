<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\LeaveType;
use App\Models\User; 
use App\Services\leave\type\LeaveTypeService;
use App\Services\leave\request\LeaveRequestService;


use App\Http\Requests\LeaveRequest\StoreLeaveRequest; 

 
use Illuminate\Support\Facades\Auth;

class LeaveRequestUserController extends Controller
{ 

    public function __construct(LeaveRequestService $leaveRequestService,LeaveTypeService $leaveTypeService){ 
      
      $this->leaveRequestService = $leaveRequestService;
      
      $this->leaveTypeService = $leaveTypeService;
  
    }

    public function create(){
    
        $avalableLeaveTypesIds =  $this->leaveTypeService->availableLeaveTypes(User::find(Auth::user()->id));
     
        $leaveTypes = LeaveType::with("leave_counters")->get()->map(function ($item) use($avalableLeaveTypesIds){
     
          if(in_array($item->id , $avalableLeaveTypesIds)){
    
            $item->total = $item->leave_counters[0]->total ?? 0;
            $item->remaining = $item->leave_counters[0]->remaining ?? 0;
    
          }else{
    
            $item->total =  0;
            $item->remaining =  0;
    
          }
        
         $item->active = in_array($item->id , $avalableLeaveTypesIds)?  false  :  true  ;
    
         return $item;
       }); 
    
        return view('dashboard.leaveRequest.user.create',compact('leaveTypes','avalableLeaveTypesIds'));
      }

      public function store(StoreLeaveRequest $request)
      { 
    
        $user = Auth::user();

        $request->request->add(['user_id'=>$user->id]);

        $user = User::find($request->user_id);   
    
       if($this->leaveRequestService->haveLeaveBalance($user,$request))
       {
    
        $this->leaveRequestService->storeLeaveRequest($request,$user);
         
        toast('Your Request as been sabmited!','success');
    
        } 
        
        return redirect()->back();
      }
}
