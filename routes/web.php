<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;

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

Route::view('/','login');
//driver
Route::post('/user',[VehicleController::class,'admin']);
Route::post('/createuser',[VehicleController::class,'createuser']) ;
Route::get('/user',[VehicleController::class,'userlist']);
Route::post('/updateuserdetails/{id}',[VehicleController::class,'updateuserdetails']);
Route::get('/delete/{id}',[VehicleController::class,'delete']);


//vehicle
Route::post('/createvehicle',[VehicleController::class,'createvehicle']) ;
Route::get('/vehiclelist',[VehicleController::class,'vehiclelist']);
Route::post('/updatevehicle/{id}',[VehicleController::class,'updatevehicle']);
Route::get('/remove/{id}',[VehicleController::class,'remove']);


Route::get('/vehicleassign',[VehicleController::class,'vehicleassign']);
Route::post('/vehicleassignlist',[VehicleController::class,'vehicleassignlist']);
Route::get('/vehicleassignedlist',[VehicleController::class,'vehicleassignedlist']);
Route::get('/deleteId/{id}',[VehicleController::class,'deleteId']);





