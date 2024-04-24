<?php

use App\Http\Controllers\Accountcontroller;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


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
    return view('welcome');
});

Route::get('/', [HomeController::class,'index'])->name('home');



Route::group(['account'], function(){

    //Guest Routes
Route::group(['middleware' => 'guest'], function(){
    Route::get('/account/register', [Accountcontroller::class,'registration'])->name('account.registration');
    Route::post('/account/process-register', [Accountcontroller::class,'processRegistration'])->name('account.processRegistration');
    Route::get('/account/login', [Accountcontroller::class,'login'])->name('account.login');
    Route::post('/account/authenticate', [Accountcontroller::class,'authenticate'])->name('account.authenticate');
     });

    //Auth Routes
Route::group(['middleware' => 'auth'], function(){
    Route::get('/profile', [Accountcontroller::class,'profile'])->name('account.profile');
    Route::put('/update-profile', [Accountcontroller::class,'updateProfile'])->name('account.updateProfile');
    Route::get('/account/logout', [Accountcontroller::class,'logout'])->name('account.logout');
    Route::post('/update-profile-pic', [Accountcontroller::class,'updateProfilePic'])->name('account.updateProfilePic');
    Route::get('/create-job', [Accountcontroller::class,'createJob'])->name('account.createJob');
    Route::post('/save-job', [Accountcontroller::class,'saveJob'])->name('account.saveJob');
    Route::get('/my-jobs', [Accountcontroller::class,'myJobs'])->name('account.myJobs');
    Route::get('/my-jobs/edit/{jobId}', [Accountcontroller::class,'editJob'])->name('account.editJob');
    Route::post('/update-job/{jobId}', [Accountcontroller::class,'updateJob'])->name('account.updateJob');
     });
});