<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\User;
use App\Http\Requests\StoreTrainingRequest;
use App\Http\Requests\UpdateTrainingRequest;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $trainings = Training::paginate(5);
        return view('dashboard.training.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $users = User::all();
        return view('dashboard.training.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTrainingRequest  $request
     *
     */
    public function store(StoreTrainingRequest $request)
    {
        Training::create($request->validated());
        toast('Your Training as been sabmited!', 'success');
        return redirect('/training');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $training)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTrainingRequest  $request
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrainingRequest $request, Training $training)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Training  $training
     */
    public function destroy($id)
    {
        Training::destroy($id);
        toast('deleted with successfully', 'success');
        return redirect()->back();
    }
}