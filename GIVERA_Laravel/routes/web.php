<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CategoryController;

Route::get("/products", [ProductController::class,"index"])->name('products.index');
Route::post("/products123", [ProductController::class,"store"]);
Route::get('/products/{product}/edit', [ProductController::class, 'edit']);
Route::put('/products/{product}', [ProductController::class, 'update']);
Route::delete('/products/{product}', [ProductController::class, 'destroy']);

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories123', [CategoryController::class, 'store']);
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit']);
Route::put('/categories/{category}', [CategoryController::class, 'update']);
Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);

Route::get("/employee", [EmployeeController::class,"index"]);
Route::post("/employee123", [EmployeeController::class,"store"]);
Route::get('/employee/{employee}/edit', [EmployeeController::class, 'edit']);
Route::put('/employee/{employee}', [EmployeeController::class, 'update']);
Route::delete('/employee/{employee}', [EmployeeController::class, 'destroy']);