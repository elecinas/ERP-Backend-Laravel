<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//CRUD de Client
Route::get('/users/clients', [ClientController::class, 'index']);
Route::post('/users/clients', [ClientController::class, 'store']);
Route::get('/users/clients/{id}', [ClientController::class, 'show']);
Route::put('/users/clients/{id}', [ClientController::class, 'update']);
Route::delete('/users/clients/{id}', [ClientController::class, 'destroy']);

//CRUD de Employee
Route::get('/users/employees', [EmployeeController::class, 'index']);
Route::post('/users/employees', [EmployeeController::class, 'store']);
Route::get('/users/employees/{id}', [EmployeeController::class, 'show']);
Route::put('/users/employees/{id}', [EmployeeController::class, 'update']);
Route::delete('/users/employees/{id}', [EmployeeController::class, 'destroy']);
