<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssignController;
use App\Http\Controllers\InspectionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\VisualdamageController;
use App\Http\Controllers\VehiclecheckController;
use App\Http\Controllers\CabinController;

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

//login
Route::view('/', 'login');
Route::post('/user', [LoginController::class, 'admin']);

//driver
Route::post('/createuser', [UserController::class, 'createuser']);
Route::get('/user', [UserController::class, 'userlist']);
Route::get('/updateuser/{id}', [UserController::class, 'updateuser']);
Route::post('/updateuserdetails/{id}', [UserController::class, 'updateuserdetails']);
Route::get('/delete/{id}', [UserController::class, 'delete']);

//vehicle
Route::post('/createvehicle', [VehicleController::class, 'createvehicle']);
Route::get('/vehiclelist', [VehicleController::class, 'vehiclelist']);
Route::get('/updatevehicles/{id}', [VehicleController::class, 'updatevehicles']);
Route::post('/updatevehicle/{id}', [VehicleController::class, 'updatevehicle']);
Route::get('/remove/{id}', [VehicleController::class, 'remove']);

//assign
Route::get('/vehicleassign', [AssignController::class, 'vehicleassign']);
Route::post('/vehicleassignlist', [AssignController::class, 'vehicleassignlist']);
Route::get('/vehicleassignedlist', [AssignController::class, 'vehicleassignedlist']);
Route::get('/updateassignlist/{id}', [AssignController::class, 'updateassignlist']);
Route::get('/deleteId/{id}', [AssignController::class, 'deleteId']);

//inspection
Route::get('/inspection/{id}', [InspectionController::class, 'weeklyinspection']);
Route::post('/store/{id}', [InspectionController::class, 'store']);
Route::get('/inspectiondetails', [InspectionController::class, 'inspection']);
Route::get('/deleteinspection/{id}', [InspectionController::class, 'deleteinspection']);

//report
Route::get('/updatereport/{id}', [ReportController::class, 'updatereport']);
Route::post('/reportonincident/{id}', [ReportController::class, 'reportonincident']);
Route::get('/reportlist', [ReportController::class, 'reportlist']);
Route::get('/deletereport/{id}', [ReportController::class, 'deletereport']);


Route::get('/details/{inspection_id}', [VisualdamageController::class, 'check']);
//visusal
Route::get('/updatevisualcheck/{id}', [VisualdamageController::class, 'updatevisualcheck']);
Route::post('/visualupdate/{id}', [VisualdamageController::class, 'visualupdate']);
Route::get('/deletevisual/{id}', [VisualdamageController::class, 'deletevisual']);

//vehicle
Route::get('/updatevehiclecheck/{id}', [VehiclecheckController::class, 'updatevehiclecheck']);
Route::post('/vehicleupdate/{id}', [VehiclecheckController::class, 'vehicleupdate']);
Route::get('/deletevehicle/{id}', [VehiclecheckController::class, 'deletevehicle']);

//cabin
Route::get('/updatecabincheck/{id}', [CabinController::class, 'updatecabincheck']);
Route::post('/cabinupdate/{id}', [CabinController::class, 'cabinupdate']);
Route::get('/deletecabin/{id}', [CabinController::class, 'deletecabin']);

//reportsummary
Route::get('/summary/{id}', [VehicleController::class, 'summary']);
Route::get('/pdf/{id}', [VehicleController::class, 'pdf']);
Route::get('/edit/{id}', [VehicleController::class, 'edit']);
