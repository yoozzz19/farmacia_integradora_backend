<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



// Staff login
Route::post('/login/staff', [AuthController::class, 'loginStaff']);

// Clientes login
Route::post('/register/customer', [AuthController::class, 'registerCustomer']);
Route::post('/login/customer', [AuthController::class, 'loginCustomer']);


// Crear nuevo staff (solo admin)
Route::post('/register/staff', [AuthController::class, 'registerStaff'])->middleware('auth:sanctum');


// Obtener información del usuario
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
