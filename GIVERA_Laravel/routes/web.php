<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmployeeController;

Route::get("/products", [ProductController::class,"index"]);
Route::post("/products123", [ProductController::class,"store"]);
Route::get('/products/{product}/edit', [ProductController::class, 'edit']);
Route::put('/products/{product}', [ProductController::class, 'update']);
Route::delete('/products/{product}', [ProductController::class, 'destroy']);

Route::get("/employee", [EmployeeController::class,"index"]);
Route::post("/employee123", [EmployeeController::class,"store"]);
Route::get('/employee/{employee}/edit', [EmployeeController::class, 'edit']);
Route::put('/employee/{employee}', [EmployeeController::class, 'update']);
Route::delete('/employee/{employee}', [EmployeeController::class, 'destroy']);