<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeaveCounterRequest;
use App\Http\Requests\UpdateLeaveCounterRequest;
use App\Models\LeaveCounter;

class LeaveCounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('dashboard.leaveCounter.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLeaveCounterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLeaveCounterRequest $request)
    {
        //
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
