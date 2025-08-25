<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CandidateController; 
use App\Http\Controllers\LeaveCounterController; 
use App\Http\Controllers\LeaveTypeController; 
use App\Http\Controllers\LeaveRequestController; 
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\user\LeaveRequestUserController;

use App\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { 
 
    return redirect('/login');

});

Route::middleware('auth')->controller(ProfileController::class)->prefix("profile")->group(function (){
   
    Route::get('/edit','edit')->name('profile/edit');

    Route::post('/update','update')->name('profile/update');

    Route::post('/updatePassword','updatePassword')->name('profile/updatePassword');

});

Route::middleware('auth')->controller(CategoryController::class)->prefix("category")->group(function (){

    Route::get('/', 'index')->name('category');
    
    Route::get('/create', 'create')->name('category/create');
    
    Route::post('/store', 'store')->name('category/store');
    
    Route::get('/edit/{id}', 'edit')->name('category/edit')->where('id','[0-9]+');
    
    Route::post('/update', 'update')->name('category/update')->where('id','[0-9]+');
    
    Route::get('/destroy/{id}', 'destroy')->name('category/destroy')->where('id','[0-9]+');
    
});


Route::middleware('auth')->controller(TrainingController::class)->name("training.")->prefix("training")->group(function (){

    Route::get('/', 'index')->name('index');
    
    Route::get('/create', 'create')->name('create');
    
    Route::post('/store', 'store')->name('store');
    
    Route::get('/edit/{id}', 'edit')->name('edit')->where('id','[0-9]+');
    
    Route::post('/update', 'update')->name('update')->where('id','[0-9]+');
    
    Route::get('/destroy/{id}', 'destroy')->name('destroy')->where('id','[0-9]+');
    
});

Route::middleware('auth')->prefix("recruitments")->group(function(){

    Route::controller(JobController::class)->name("jobs.")->prefix("jobs")->group(function (){

        Route::get('/', 'index')->name('index');
        
        Route::get('/create', 'create')->name('create');
        
        Route::post('/store', 'store')->name('store');
        
        Route::get('/edit/{id}', 'edit')->name('edit')->where('id','[0-9]+');
        
        Route::post('/update', 'update')->name('update')->where('id','[0-9]+');
        
        Route::get('/destroy/{job}', 'destroy')->name('destroy')->where('id','[0-9]+');
        
    });

    Route::controller(CandidateController::class)->name("candidates.")->prefix("candidates")->group(function (){

        Route::get('/', 'index')->name('index');
        
        Route::get('/create', 'create')->name('create');
    
        Route::get('/show/{candidate}', 'show')->name('show');
        
        //Route::post('/store', 'store')->name('store');
        
        Route::get('/edit/{candidate}', 'edit')->name('edit')->where('id','[0-9]+');
        
        Route::post('/update', 'update')->name('update')->where('id','[0-9]+');
        
        Route::get('/destroy/{candidate}', 'destroy')->name('destroy')->where('id','[0-9]+');
        
    });

});

 
Route::middleware('auth')->prefix("accounts")->group(function (){

    Route::controller(RoleController::class)->name("role.")->prefix("role")->group(function (){

        Route::get('/', 'index')->name('index');
        
        Route::get('/create', 'create')->name('create');
        
        Route::post('/store', 'store')->name('store');
        
        Route::get('/edit/{id}', 'edit')->name('edit')->where('id','[0-9]+');
        
        Route::post('/update', 'update')->name('update')->where('id','[0-9]+');
        
        Route::get('/destroy/{id}', 'destroy')->name('destroy')->where('id','[0-9]+');
        
    });

    Route::controller(UserController::class)->name("user.")->prefix('user')->group(function ()
    {

        Route::get('/','index')->name('index');
        
        Route::get('/create','create')->name('create');

        Route::post('/store', 'store')->name('store');

        Route::get('/edit/{id}', 'edit')->name('edit')->where('id','[0-9]+');

        Route::post('/update', 'update')->name('update')->where('id','[0-9]+');

        Route::get('/destroy/{id}', 'destroy')->name('destroy')->where('id','[0-9]+');

    });

});

Route::prefix('leaves')->group(function ()
{
    
   Route::controller(LeaveCounterController::class)->name('counters.')->prefix("counters")->group(function (){

    Route::get('/', 'index')->name('index');
    
    Route::get('/create', 'create')->name('create');

    Route::get('/show/{candidate}', 'show')->name('show');
    
    Route::post('/store', 'store')->name('store');
    
    Route::get('/edit/{candidate}', 'edit')->name('edit')->where('id','[0-9]+');
    
    Route::post('/update', 'update')->name('update')->where('id','[0-9]+');
    
    Route::get('/destroy/{candidate}', 'destroy')->name('destroy')->where('id','[0-9]+');
    
   });

   Route::controller(LeaveTypeController::class)->name('types.')->prefix("types")->group(function (){

    Route::get('/', 'index')->name('index');
    
    Route::get('/create', 'create')->name('create');

    Route::get('/show/{candidate}', 'show')->name('show');
    
    Route::post('/store', 'store')->name('store');
    
    Route::get('/edit/{candidate}', 'edit')->name('edit')->where('id','[0-9]+');
    
    Route::post('/update', 'update')->name('update')->where('id','[0-9]+');
    
    Route::get('/destroy/{candidate}', 'destroy')->name('destroy')->where('id','[0-9]+');
    
  });

  Route::controller(LeaveRequestUserController::class)->name('request.user.')->prefix('myrequest')->group(function (){

    Route::get('/create', 'create')->name('create'); 

    Route::post('/store', 'store')->name('store'); 

  });

  Route::controller(LeaveRequestController::class)->name('request.')->prefix('request')->group(function ()
  {

    Route::get('/', 'index')->name('index');

    Route::get('/create', 'create')->name('create');

    Route::post('/store', 'store')->name('store');
    
    Route::get('/edit/{leaveRequest}' , 'edit')->name('edit');

    Route::post('/update','update')->name('update'); 

    Route::get('/avalableLeaveTypesByUser/{userId}','avalableLeaveTypesByUser')->name('avalableLeaveTypesByUser');

    Route::get('/destroy/{leaveRequest}','destroy')->name('destroy');

  });

});

Route::middleware("auth")->prefix("company")->group(function (){

    Route::controller(DepartmentController::class)->name("department.")->prefix("department")->group(function (){

        Route::get('/', 'index')->name('index');
        
        Route::get('/create', 'create')->name('create');
    
        Route::get('/show/{department}', 'show')->name('show');
        
        Route::post('/store', 'store')->name('store');
        
        Route::get('/edit/{department}', 'edit')->name('edit')->where('id','[0-9]+');
        
        Route::post('/update', 'update')->name('update')->where('id','[0-9]+');
        
        Route::get('/destroy/{department}', 'destroy')->name('destroy')->where('id','[0-9]+');
        
    });

});

Route::prefix(config("app.name"))->group(function (){

    Route::controller(JobController::class)->prefix("jobs")->name(config("app.name").".jobs.")->group(function (){

        Route::get("/","jobs")->name("jobs");

        Route::get("/{job}","jobsShow")->name("show");

    });

    Route::controller(CandidateController::class)->prefix("candidates")->name(config("app.name").".candidates.")->group(function (){

        Route::post("/store","store")->name("store");

    });

});

Auth::routes([
    "register" => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('validStatus');
