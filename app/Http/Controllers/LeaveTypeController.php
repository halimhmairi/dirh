<?php

namespace App\Http\Controllers;

use App\Http\Requests\leaveType\StoreLeaveTypeRequest;
use App\Http\Requests\leaveType\UpdateLeaveTypeRequest;
use App\Models\LeaveType;

class LeaveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = LeaveType::orderBy("created_at")->paginate(5);
        return view('dashboard.leaveType.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.leaveType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLeaveTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLeaveTypeRequest $request)
    {
        LeaveType::create($request->all());
        toast(__('messages.Your leave type has been submitted!'),'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LeaveType  $leaveType
     * @return \Illuminate\Http\Response
     */
    public function show(LeaveType $leaveType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($leaveType)
    {
        $type = LeaveType::find($leaveType);
        return view('dashboard.leaveType.edit',compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLeaveTypeRequest  $request
     * @param  \App\Models\LeaveType  $leaveType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLeaveTypeRequest $request)
    {
        leaveType::find($request->id)->update($request->except('id'));
        toast(__('messages.Your leave type has been updated!'),'success');
        return redirect('/leaves/types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LeaveType  $leaveType
     * @return \Illuminate\Http\Response
     */
    public function destroy($leaveType)
    {
        LeaveType::destroy($leaveType);
        toast(__('messages.Your leave type has been deleted!'),'success'); 
        return redirect()->back();

    }

    public function indexApi(){

        $leaveType = LeaveType::all();

        return response()->json([
            "leaveTypes" => $leaveType
        ],200);
    }
}
