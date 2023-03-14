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
Route::post('/user',[VehicleController::class,'admin']);
Route::post('/createuser',[VehicleController::class,'createuser']) ;
Route::get('/user',[VehicleController::class,'userlist']);

// Route::view('/','login');
// Route::post('/user',[VehicleController::class,'admin']);
// Route::get('/user',[VehicleController::class,'userlist']);
// Route::post('/createuser',[VehicleController::class,'createuser']) ;

