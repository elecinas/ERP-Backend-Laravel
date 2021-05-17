<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Clients & Employees
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;

//Auth
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
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

//CRUD de Product
Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);


//AUTH
Route::post('/auth/register', [RegisteredUserController::class, 'store']);
Route::post('/auth/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/auth/logout', [AuthenticatedSessionController::class, 'destroy'])
            ->middleware('jwt.verify');
