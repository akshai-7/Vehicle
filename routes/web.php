<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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

Route::view('/', 'login');
Route::post('/user', [VehicleController::class, 'admin']);
//driver
Route::post('/createuser', [VehicleController::class, 'createuser']);
Route::get('/user', [VehicleController::class, 'userlist']);
Route::get('/updateuser/{id}', [VehicleController::class, 'updateuser']);
Route::post('/updateuserdetails/{id}', [VehicleController::class, 'updateuserdetails']);
Route::get('/delete/{id}', [VehicleController::class, 'delete']);

//vehicle
Route::post('/createvehicle', [VehicleController::class, 'createvehicle']);
Route::get('/vehiclelist', [VehicleController::class, 'vehiclelist']);
Route::get('/updatevehicles/{id}', [VehicleController::class, 'updatevehicles']);
Route::post('/updatevehicle/{id}', [VehicleController::class, 'updatevehicle']);
Route::get('/remove/{id}', [VehicleController::class, 'remove']);

//assign
Route::get('/vehicleassign', [VehicleController::class, 'vehicleassign']);
Route::post('/vehicleassignlist', [VehicleController::class, 'vehicleassignlist']);
Route::get('/vehicleassignedlist', [VehicleController::class, 'vehicleassignedlist']);
Route::get('/deleteId/{id}', [VehicleController::class, 'deleteId']);

//inspection
Route::get('/inspection/{id}', [VehicleController::class, 'weeklyinspection']);
Route::post('/store/{id}', [VehicleController::class, 'store']);
Route::get('/inspectiondetails', [VehicleController::class, 'inspection']);
Route::get('/details/{id}', [VehicleController::class, 'check']);


//visusal
Route::get('/updatevisualcheck/{id}', [VehicleController::class, 'updatevisualcheck']);
Route::post('/visualupdate/{id}', [VehicleController::class, 'visualupdate']);
Route::get('/deletevisual/{id}', [VehicleController::class, 'deletevisual']);

//vehicle
Route::get('/updatevehiclecheck/{id}', [VehicleController::class, 'updatevehiclecheck']);
Route::post('/vehicleupdate/{id}', [VehicleController::class, 'vehicleupdate']);
Route::get('/deletevehicle/{id}', [VehicleController::class, 'deletevehicle']);

//cabin
Route::get('/updatecabincheck/{id}', [VehicleController::class, 'updatecabincheck']);
Route::post('/cabinupdate/{id}', [VehicleController::class, 'cabinupdate']);
Route::get('/deletecabin/{id}', [VehicleController::class, 'deletecabin']);

//reportsummary
Route::get('/summary/{id}', [VehicleController::class, 'summary']);
Route::get('/pdf/{id}', [VehicleController::class, 'pdf']);
Route::get('/edit/{id}', [VehicleController::class, 'edit']);
