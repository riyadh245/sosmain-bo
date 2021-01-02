<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
    return view('/welcome');
});
Auth::routes();

//Register routes
Route::get('/chose-user', [App\Http\Controllers\Auth\RegisterController::class, 'choseUser'])->name('chose-user');
Route::post('/add-user/{userType}',[App\Http\Controllers\Auth\RegisterController::class, 'addUser'])->name('add-user');
Route::get('/register-user/{userType}',[App\Http\Controllers\Auth\RegisterController::class, 'showRegisterForm'])->name('register-user');

Route::group(['middleware' => 'auth'], function () {

    //Admin routes

    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/doctor-table', [App\Http\Controllers\Doctor\DoctorController::class,'showAllDoctors'])->name('admin.management.user');
    Route::get('/center-table', [App\Http\Controllers\Center\CenterController::class,'showAllCenters'])->name('admin.management.center');
    Route::get('/expert-center-table', [App\Http\Controllers\Center\CenterController::class,'showAllCentersExpert'])->name('expert.admin.management.centre');

    Route::get('/expert-table', [App\Http\Controllers\Expert\ExpertController::class,'showAllExperts'])->name('admin.management.expert');
    Route::get('/patient-table', [App\Http\Controllers\Patient\PatientController::class,'showAllPatients'])->name('admin.management.patients');
    Route::get('/all-experts/{pagination}', [App\Http\Controllers\Expert\ExpertController::class, 'getAllExperts']);
    Route::get('/all-doctors/{pagination}', [App\Http\Controllers\Doctor\DoctorController::class, 'getAllDoctors']);
    Route::put('/user/{id}', [App\Http\Controllers\UserController::class, 'updateUser'])->name('expert.management');
    Route::get('/all-patients/{pagination}', [App\Http\Controllers\Patient\PatientController::class, 'getAllPatients']);
    Route::put('/delete-user/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('delete-user');

    //To change with 1 route: => function changeStatus(User,NewStatus)
    Route::put('/validated/{id}', [App\Http\Controllers\UserController::class, 'validated']);
    Route::put('/inactivated/{id}', [App\Http\Controllers\UserController::class, 'inactivated']);
    Route::put('/approved/{id}', [App\Http\Controllers\UserController::class, 'approve']);

    //Route for centre list
    Route::get('/all-centers/{pagination}',[App\Http\Controllers\Center\CenterController::class,'getAllCenters']);
    Route::put('/update-center/{id}', [App\Http\Controllers\Center\CenterController::class, 'updateCenter']);
    Route::put('/delete-center/{id}', [App\Http\Controllers\Center\CenterController::class, 'deleteCenter'])->name('delete-center');
    Route::post('/create-center', [App\Http\Controllers\Center\CenterController::class,'addCenter']);
    
    // route to get the number of the table 
    Route::get('/number-center',[App\Http\Controllers\Center\CenterController::class,'getNumberCenters']);
    Route::get('/number-patient',[App\Http\Controllers\Patient\PatientController::class,'getNumberPatient']);
    Route::get('/number-expert',[App\Http\Controllers\Expert\ExpertController::class,'getNumberExpert']);
    Route::get('/number-doctor',[App\Http\Controllers\Doctor\DoctorController::class,'getNumberDoctor']);

});
