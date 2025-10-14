<?php

namespace App\Http\Controllers;
 
use App\Repositories\user\UserRepository;
use App\Http\Requests\user\StoreUserRequest;
use App\Http\Requests\user\UpdateUserRequest;
use App\Repositories\Role\RoleRepository;
use Illuminate\Support\Facades\Auth; 
use App\Models\Department;
use App\Models\User;

use Intervention\Image\Facades\Image as Image;

class UserController extends Controller
{
    public $userRepository;
    public $roleRepository;
    private $user;
    public function __construct(UserRepository $userRepository,RoleRepository $roleRepository)
    {
        $this->userRepository =  $userRepository;
        $this->roleRepository = $roleRepository;

        $this->middleware(function ($request, $next) {

            $this->user = Auth::user();
            $this->authorize('is_admin',$this->user);

            return $next($request);
        });
 
       
       
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);
        return view('dashboard.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roleRepository->all();
        $departments = Department::all();
        return view('dashboard.user.create',compact('roles','departments'));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    { 
        $data = $request->all();
        
        if($request->hasFile("avatar"))
        {

            $originalImage = $request->file('avatar'); 
            $originalPath = public_path()."/avatar/";
            $newNameImage = "avatar_".time().$originalImage->getClientOriginalName();
    
            $request->avatar->move($originalPath,$newNameImage); 

            $data['avatar'] = $newNameImage; 

        } 

        User::create($data); 

        toast(__('messages.Your user has been created!'),'success');
        return redirect('accounts/user');
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = $this->roleRepository->all();
        $departments = Department::all();
        $user = $this->userRepository->getById($id);
        return view('dashboard.user.edit',compact('user','roles','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    {
        $user = User::find($request->id);  

        $data = $request->except('id');

        //to do change avatar
        if($request->hasFile('avatar'))
        {
            $originalImage = $request->file('avatar'); 
            $originalPath = public_path()."/avatar/";
            $newNameImage = "avatar_".time().$originalImage->getClientOriginalName();
    
            $request->avatar->move($originalPath,$newNameImage); 

            $data['avatar'] = $newNameImage; 
        }



        if($user->status !== $request->status)
        {
            $user->update($data);

        } else{ 
               
          $user->updateQuietly($data); 

        }


        toast('Your Role as been updatedt!','success');
        return redirect('accounts/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $this->userRepository->deleteById($id);
        return redirect()->back()->with('success','test dev');
    }
}
