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
    //$details['email'] = 'testdev@gmail.com';

    //dispatch(new App\Jobs\SendEmailJob($details));
 
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


Route::middleware('auth')->controller(JobController::class)->prefix("jobs")->group(function (){

    Route::get('/', 'index')->name('jobs');
    
    Route::get('/create', 'create')->name('jobs/create');
    
    Route::post('/store', 'store')->name('jobs/store');
    
    Route::get('/edit/{id}', 'edit')->name('jobs/edit')->where('id','[0-9]+');
    
    Route::post('/update', 'update')->name('jobs/update')->where('id','[0-9]+');
    
    Route::get('/destroy/{job}', 'destroy')->name('jobs/destroy')->where('id','[0-9]+');
    
});


Route::middleware('auth')->controller(CandidateController::class)->prefix("candidates")->group(function (){

    Route::get('/', 'index')->name('candidates');
    
    Route::get('/create', 'create')->name('candidates/create');

    Route::get('/show/{candidate}', 'show')->name('candidates/show');
    
    Route::post('/store', 'store')->name('candidates/store');
    
    Route::get('/edit/{candidate}', 'edit')->name('candidates/edit')->where('id','[0-9]+');
    
    Route::post('/update', 'update')->name('candidates/update')->where('id','[0-9]+');
    
    Route::get('/destroy/{candidate}', 'destroy')->name('candidates/destroy')->where('id','[0-9]+');
    
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

  Route::controller(LeaveRequestController::class)->name('request.')->prefix("request")->group(function ()
  {

    Route::get('/', 'index')->name('index');

    Route::get('/create', 'create')->name('create');

    Route::post('/store', 'store')->name('store');
    
    Route::get('/edit/{leaveRequest}' , 'edit')->name('edit');

    Route::post('/update','update')->name('update');

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('validStatus');
