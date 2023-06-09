<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [ApiController::class, 'login']);
Route::post('/inspection/{assign_id}', [ApiController::class, 'inspection'])->middleware('auth:sanctum');
Route::post('/report/{assign_id}', [ApiController::class, 'report'])->middleware('auth:sanctum');
Route::post('/visualcheck/{inspection_id}', [ApiController::class, 'visualcheck'])->middleware('auth:sanctum');
Route::get('/pdf/{inspection_id}', [ApiController::class, 'pdf'])->middleware('auth:sanctum');
