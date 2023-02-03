<?php

namespace App\Http\Controllers;
use App\Models\Leave;
use App\Models\LeaveType;

use App\Http\Requests\LeaveRequest\StoreLeaveRequest; 

class LeaveRequestController extends Controller
{
  public function index()
  {
    $leaveRequests = Leave::orderBy('created_at')->paginate(5);
    return view('dashboard.leaveRequest.index',compact('leaveRequests'));
  }

  
  public function create()
  {
    $leaveTypes = LeaveType::all();
    return view('dashboard.leaveRequest.create',compact('leaveTypes'));
  }

  public function store(StoreLeaveRequest $request)
  {
    Leave::create($request->all());
    toast('Your Request as been sabmited!','success');
    return redirect()->back();
  }

}
