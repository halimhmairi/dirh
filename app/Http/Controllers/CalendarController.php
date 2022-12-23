<?php

namespace App\Http\Controllers;

use App\Http\Requests\calendar\StoreCalendarRequest;
use App\Http\Requests\calendar\UpdateCalendarRequest;
use App\Models\Calendar;
use App\Models\LeaveType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
    public function index(Request $request)
    {
      
        //GET all event (admin)
        $events = Calendar::all();

        //GET event of my session
        //$events = Calendar::where('user_id',Auth::user()->id)->get();

        //return response()->json(['events'=>$events]);

       

        if($request->ajax()) {  
            
            $data = Calendar::whereDate('start_date', '>=', $request->start)
            ->whereDate('end_date',   '<=', $request->end)
            ->get(['id', 'event_type', 'start_date', 'end_date'])->map(function($item){
                return ['id'=>$item['id'],'title'=>$item['event_type'],
                'start'=>$item['start_date'],'end'=>$item['end_date'] ,
                 'color' => 'orange' , 'textColor' => 'black','kind'=>'festival'];
            });
    
           
               
            return response()->json($data);
        }

        $leaveTypes = LeaveType::all();

        return view("dashboard.calendar.index",compact('leaveTypes'));
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
