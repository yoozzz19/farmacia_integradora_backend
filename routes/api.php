<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::delete('/delete/{id}', [ProductsController::class, 'delete']);