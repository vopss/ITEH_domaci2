<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\VehicleController;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/driver', [DriverController::class, 'index']);
    Route::get('/driver/{id}', [DriverController::class, 'show']);

    Route::delete('/vehicle/{id}', [VehicleController::class, 'destroy']);
    Route::get('/vehicle', [VehicleController::class, 'index']);
    Route::patch('/vehicle/{id}', [VehicleController::class, 'update']);
    Route::post('/vehicle', [VehicleController::class, 'store']);

    Route::get('/manufacturer', [ManufacturerController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
