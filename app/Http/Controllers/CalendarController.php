<?php

namespace App\Http\Controllers;

use App\Http\Requests\calendar\StoreCalendarRequest;
use App\Http\Requests\calendar\UpdateCalendarRequest;
use App\Models\Calendar;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{

    public function __construct(){
       
        //check permission

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //GET all event (admin)
        $events = Calendar::all();

        //GET event of my session
        //$events = Calendar::where('user_id',Auth::user()->id)->get();

        //return response()->json(['events'=>$events]);

        return view("dashboard.calendar.index");
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
     * @param  \App\Http\Requests\calendar\StoreCalendarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCalendarRequest $request)
    {
        $event = Calendar::create($request->all());
        return response()->json(['status'=>'success','event'=>$event]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function show(Calendar $calendar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function edit(Calendar $calendar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCalendarRequest  $request
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCalendarRequest $request, Calendar $calendar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calendar $calendar)
    {
        //
    }
}
