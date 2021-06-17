<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DepartmentController;

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



Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('/users', UserController::class);
Route::resource('/countries', CountryController::class);
Route::resource('/states', StateController::class);
Route::resource('/cities', CityController::class);
Route::resource('/departments', DepartmentController::class);
Route::get('/users/{id}/destroy', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/countries/{id}/destroy', [CountryController::class, 'destroy'])->name('countries.destroy');
Route::get('/states/{id}/destroy', [StateController::class, 'destroy'])->name('states.destroy');
Route::get('/cities/{id}/destroy', [CityController::class, 'destroy'])->name('cities.destroy');
Route::get('/departments/{id}/destroy', [DepartmentController::class, 'destroy'])->name('departments.destroy');
Route::get('/employees', function(){
	return view('employees.list');
})->name('employees');