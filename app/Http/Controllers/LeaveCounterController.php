<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeaveCounter\StoreLeaveCounterRequest;
use App\Http\Requests\LeaveCounter\UpdateLeaveCounterRequest;
use App\Models\LeaveCounter;
use App\Models\User;
use App\Models\LeaveType;
use Illuminate\Support\Facades\Auth;

class LeaveCounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user = Auth::user(); 
       $leaveCounters = LeaveCounter::where('user_id',$user->id)->get();
   
       return view('dashboard.leaveCounter.index',compact('leaveCounters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $users = User::all();
     $leaveTypes = LeaveType::all();
     return view('dashboard.leaveCounter.create',compact('users','leaveTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLeaveCounterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLeaveCounterRequest $request)
    {
        LeaveCounter::create($request->all());
        toast('Your Leave Counter as been sabmited!','success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LeaveCounter  $leaveCounter
     * @return \Illuminate\Http\Response
     */
    public function show(LeaveCounter $leaveCounter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LeaveCounter  $leaveCounter
     * @return \Illuminate\Http\Response
     */
    public function edit(LeaveCounter $leaveCounter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLeaveCounterRequest  $request
     * @param  \App\Models\LeaveCounter  $leaveCounter
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLeaveCounterRequest $request, LeaveCounter $leaveCounter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LeaveCounter  $leaveCounter
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveCounter $leaveCounter)
    {
        //
    }
}
