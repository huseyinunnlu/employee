<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmployeeDataController;
use App\Http\Controllers\Api\EmployeeController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employees/countries', [EmployeeDataController::class, 'countries']);
Route::get('/employees/{country_id}/states', [EmployeeDataController::class, 'states']);
Route::get('/employees/{state_id}/cities', [EmployeeDataController::class, 'cities']);
Route::get('/employees/departments', [EmployeeDataController::class, 'departments']);

Route::get('/employees', [EmployeeController::class, 'index']);
Route::post('/employees/store', [EmployeeController::class, 'store']);
Route::delete('/employees/{employee}/delete', [EmployeeController::class, 'destroy']);
Route::get('/employees/{employee}/edit', [EmployeeController::class, 'show']);
Route::post('/employees/{employee}/update', [EmployeeController::class, 'update']);