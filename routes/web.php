<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssignController;
use App\Http\Controllers\InspectionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\VisualdamageController;
use App\Http\Controllers\VehiclecheckController;
use App\Http\Controllers\CabinController;
use App\Http\Controllers\DashboardController;

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
Route::view('dashboard', 'dashboard');
Route::view('/home', 'home');
Route::view('/addadmin', 'addadmin');
Route::get('/dashboard', [DashboardController::class, 'dashboard']);
Route::post('/user', [LoginController::class, 'admin']);
Route::post('/passwordreset', [LoginController::class, 'passwordreset']);
Route::post('/passwordupdate', [LoginController::class, 'passwordupdate']);

//driver
Route::view('/adduser', 'adduser');
Route::post('/createuser', [UserController::class, 'createuser']);
Route::get('/users', [UserController::class, 'users']);
Route::get('/admin', [UserController::class, 'admin']);
Route::get('/adminsearch', [UserController::class, 'adminsearch']);
Route::get('/driversearchbar', [UserController::class, 'driversearchbar']);
Route::get('/adminsearchbar', [UserController::class, 'adminsearchbar']);
Route::get('/user', [UserController::class, 'userlist']);
Route::post('/updateuserdetails/{id}', [UserController::class, 'updateuserdetails']);
Route::get('/delete/{id}', [UserController::class, 'delete']);

//vehicle
Route::view('/addvehicle', 'addvehicle');
Route::post('/createvehicle', [VehicleController::class, 'createvehicle']);
Route::get('/vehiclelist', [VehicleController::class, 'vehiclelist']);
Route::get('/vehiclelists', [VehicleController::class, 'vehiclelists']);
Route::get('/searchbar', [VehicleController::class, 'searchbar']);
Route::post('/updatevehicle/{id}', [VehicleController::class, 'updatevehicle']);
Route::get('/remove/{id}', [VehicleController::class, 'remove']);

//assign
Route::post('/vehicleassignlist', [AssignController::class, 'vehicleassignlist']);
Route::get('/assignsearch', [AssignController::class, 'assignsearch']);
Route::get('/assignsearchbar', [AssignController::class, 'assignsearchbar']);
Route::get('/vehicleassignedlist', [AssignController::class, 'vehicleassignedlist']);
Route::get('/deleteId/{id}', [AssignController::class, 'deleteId']);

//inspection
Route::post('/store/{id}', [InspectionController::class, 'store']);
Route::get('/inspectiondetails', [InspectionController::class, 'inspection']);
Route::post('/inspectionupdate/{id}', [InspectionController::class, 'inspectionupdate']);
Route::get('/inspectionform', [InspectionController::class, 'inspectionform']);
Route::get('/deleteinspection/{id}', [InspectionController::class, 'deleteinspection']);
Route::get('/search', [InspectionController::class, 'search']);
Route::get('/inspectionsearchbar', [InspectionController::class, 'inspectionsearchbar']);
Route::get('/archive', [InspectionController::class, 'archive']);
Route::get('/searcharchive', [InspectionController::class, 'searcharchive']);

//report
Route::get('/updatereport/{id}', [ReportController::class, 'updatereport']);
Route::post('/reportonincident/{id}', [ReportController::class, 'reportonincident']);
Route::post('/updatereport/{id}', [ReportController::class, 'updatereport']);
Route::get('/reportlist', [ReportController::class, 'reportlist']);
Route::get('/incidentform', [ReportController::class, 'incidentform']);
Route::get('/deletereport/{id}', [ReportController::class, 'deletereport']);
Route::get('/reportimages/{id}', [ReportController::class, 'reportimages']);
Route::get('/searchreport', [ReportController::class, 'searchreport']);
Route::get('/reportsearchbar', [ReportController::class, 'reportsearchbar']);
Route::get('/archivereport', [ReportController::class, 'archivereport']);
Route::get('/searcharchivereport', [ReportController::class, 'searcharchivereport']);


Route::get('/details/{inspection_id}', [VisualdamageController::class, 'check']);
//visusal
Route::get('/updatevisualcheck/{id}', [VisualdamageController::class, 'updatevisualcheck']);
Route::get('/visualimages/{id}', [VisualdamageController::class, 'visualimages']);
Route::post('/visualupdate/{id}', [VisualdamageController::class, 'visualupdate']);
Route::get('/deletevisual/{id}', [VisualdamageController::class, 'deletevisual']);

//vehicle
Route::get('/updatevehiclecheck/{id}', [VehiclecheckController::class, 'updatevehiclecheck']);
Route::get('/vehicleimages/{id}', [VehiclecheckController::class, 'vehicleimages']);
Route::post('/vehicleupdate/{id}', [VehiclecheckController::class, 'vehicleupdate']);
Route::get('/deletevehicle/{id}', [VehiclecheckController::class, 'deletevehicle']);

//cabin
Route::get('/updatecabincheck/{id}', [CabinController::class, 'updatecabincheck']);
Route::get('/cabinimages/{id}', [CabinController::class, 'cabinimages']);
Route::post('/cabinupdate/{id}', [CabinController::class, 'cabinupdate']);
Route::get('/deletecabin/{id}', [CabinController::class, 'deletecabin']);

//reportsummary
Route::get('/summary/{id}', [VehicleController::class, 'summary']);
Route::get('/pdf/{id}', [VehicleController::class, 'pdf']);
Route::get('/edit/{id}', [VehicleController::class, 'edit']);

Auth::routes();
