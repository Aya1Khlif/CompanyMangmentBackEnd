<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'products'], function () {
    // GET routes
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{id}', [ProductController::class, 'show']);
    // POST routes
    Route::post('/', [ProductController::class, 'store']);
    Route::post('/{id}/update', [ProductController::class, 'update']);
    Route::post('/{id}/delete', [ProductController::class, 'destroy']);
});
Route::group(['prefix' => 'services'], function () {
    // GET routes
    Route::get('/', [ServiceController::class, 'index']); // List all services
    Route::get('/{id}', [ServiceController::class, 'show']); // Show a single service
    // POST routes
    Route::post('/', [ServiceController::class, 'store']); // Create a new service
    Route::post('/{id}/update', [ServiceController::class, 'update']); // Update an existing service
    Route::post('/{id}/delete', [ServiceController::class, 'destroy']); // Delete a service
});
Route::group(['prefix' => 'about_us'], function () {
    // GET routes
    Route::get('/', [AboutUsController::class, 'index']); // List all about_us entries
    Route::get('/{id}', [AboutUsController::class, 'show']); // Show a single about_us entry
    // POST routes
    Route::post('/', [AboutUsController::class, 'store']); // Create a new about_us entry
    Route::post('/{id}/update', [AboutUsController::class, 'update']); // Update an existing about_us entry
    Route::post('/{id}/delete', [AboutUsController::class, 'destroy']); // Delete an about_us entry
});
Route::group(['prefix' => 'clients'], function () {
    // GET routes
    Route::get('/', [ClientController::class, 'index']); // List all clients
    Route::get('/{id}', [ClientController::class, 'show']); // Show a single client

    // POST routes
    Route::post('/', [ClientController::class, 'store']); // Store a new client
    Route::post('/{id}/update', [ClientController::class, 'update']); // Update a client
    Route::post('/{id}/delete', [ClientController::class, 'destroy']); // Delete a client
});
