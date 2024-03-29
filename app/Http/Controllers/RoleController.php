<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;  
use App\Models\Role; 
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{ 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 

       // if (Auth::user()->can('viewAny',Role::class)) 
       // {
           $roles = Role::paginate(5);
           return view('dashboard.role.index',compact('roles'));
       // }

       // abort(403);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    { 
        $this->roleRepository->create($request->all());
        toast('Your Role as been submited!','success');
        return redirect()->back();
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = $this->roleRepository->getById($id);
        return view('dashboard.role.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleRequest  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request)
    {
        $this->roleRepository->updateById($request->id,$request->except('id'));
        toast('Your Role as been updatedt!','success');
        return redirect('/role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $this->roleRepository->deleteById($id);
        return redirect()->back()->with('success','test dev');
    }
}
