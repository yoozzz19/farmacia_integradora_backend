<?php

use App\Http\Controllers\AlertController;
use App\Http\Controllers\InventoryAdjustmentController;
use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::delete('/delete/{id}', [ProductsController::class, 'delete']);

Route::get('/alert/stock', [AlertController::class, 'losStock']);
Route::get('/alert/expire', [AlertController::class, 'expireSoon']);
Route::get('/alert/expired', [AlertController::class, 'expired']);

Route::put('adjustment/{id}', [InventoryAdjustmentController::class, 'alter']);