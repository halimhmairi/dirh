<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\LeaveCounterController; 
use App\Http\Controllers\LeaveTypeController; 
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

Route::middleware('auth')->controller(UserController::class)->prefix('user')->group(function ()
{
    Route::get('/','index')->name('user');
    
    Route::get('/create','create')->name('user/create');

    Route::post('/store', 'store')->name('user/store');

    Route::get('/edit/{id}', 'edit')->name('user/edit')->where('id','[0-9]+');

    Route::post('/update', 'update')->name('user/update')->where('id','[0-9]+');

    Route::get('/destroy/{id}', 'destroy')->name('user/destroy')->where('id','[0-9]+');


});

Route::middleware('auth')->controller(ProfileController::class)->prefix("profile")->group(function (){
   
    Route::get('/edit','edit')->name('profile/edit');

    Route::post('/update','update')->name('profile/update');

    Route::post('/updatePassword','updatePassword')->name('profile/updatePassword');

});

Route::middleware('auth')->controller(RoleController::class)->prefix("role")->group(function (){

Route::get('/', 'index')->name('role');

Route::get('/create', 'create')->name('role/create');

Route::post('/store', 'store')->name('role/store');

Route::get('/edit/{id}', 'edit')->name('role/edit')->where('id','[0-9]+');

Route::post('/update', 'update')->name('role/update')->where('id','[0-9]+');

Route::get('/destroy/{id}', 'destroy')->name('role/destroy')->where('id','[0-9]+');

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

Route::controller(CalendarController::class)->prefix("calendar")->group(function (){

    Route::get('/', 'index')->name('calendars');
    
    Route::get('/create', 'create')->name('calendars/create');

    Route::get('/show/{candidate}', 'show')->name('calendars/show');
    
    Route::post('/store', 'store')->name('calendars/store');
    
    Route::get('/edit/{candidate}', 'edit')->name('calendars/edit')->where('id','[0-9]+');
    
    Route::post('/update', 'update')->name('calendars/update')->where('id','[0-9]+');
    
    Route::get('/destroy/{candidate}', 'destroy')->name('calendars/destroy')->where('id','[0-9]+');
    
});

Route::prefix('leaves')->group(function ()
{
    
   Route::controller(LeaveCounterController::class)->prefix("counters")->group(function (){

    Route::get('/', 'index')->name('counters');
    
    Route::get('/create', 'create')->name('counters/create');

    Route::get('/show/{candidate}', 'show')->name('counters/show');
    
    Route::post('/store', 'store')->name('counters/store');
    
    Route::get('/edit/{candidate}', 'edit')->name('counters/edit')->where('id','[0-9]+');
    
    Route::post('/update', 'update')->name('counters/update')->where('id','[0-9]+');
    
    Route::get('/destroy/{candidate}', 'destroy')->name('counters/destroy')->where('id','[0-9]+');
    
   });

   Route::controller(LeaveTypeController::class)->prefix("types")->group(function (){

    Route::get('/', 'index')->name('types');
    
    Route::get('/create', 'create')->name('types/create');

    Route::get('/show/{candidate}', 'show')->name('types/show');
    
    Route::post('/store', 'store')->name('types/store');
    
    Route::get('/edit/{candidate}', 'edit')->name('types/edit')->where('id','[0-9]+');
    
    Route::post('/update', 'update')->name('types/update')->where('id','[0-9]+');
    
    Route::get('/destroy/{candidate}', 'destroy')->name('types/destroy')->where('id','[0-9]+');
    
  });

});





Route::controller(DepartmentController::class)->prefix("department")->group(function (){

    Route::get('/', 'index')->name('department');
    
    Route::get('/create', 'create')->name('department/create');

    Route::get('/show/{department}', 'show')->name('department/show');
    
    Route::post('/store', 'store')->name('department/store');
    
    Route::get('/edit/{department}', 'edit')->name('department/edit')->where('id','[0-9]+');
    
    Route::post('/update', 'update')->name('department/update')->where('id','[0-9]+');
    
    Route::get('/destroy/{department}', 'destroy')->name('department/destroy')->where('id','[0-9]+');
    
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('validStatus');
