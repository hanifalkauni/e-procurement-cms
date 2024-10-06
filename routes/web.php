<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProcurementController;
use App\Http\Controllers\AuthController;

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes (only accessible to authenticated users)
Route::group(['middleware' => 'auth.jwt'], function () {

    // Dashboard route
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    // Redirect root ("/") to the dashboard
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    // Vendor management routes
    Route::get('/vendors', [VendorController::class, 'index'])->name('vendors.index');
    Route::get('/vendors/create', [VendorController::class, 'create'])->name('vendors.create');
    Route::post('/vendors', [VendorController::class, 'store'])->name('vendors.store');

    // Procurement management routes
    Route::get('/procurements', [ProcurementController::class, 'index'])->name('procurements.index');
    Route::get('/procurements/create', [ProcurementController::class, 'create'])->name('procurements.create');
    Route::post('/procurements', [ProcurementController::class, 'store'])->name('procurements.store');

    // Approve/reject procurement request 
    Route::put('/procurements/{id}/approve', [ProcurementController::class, 'approve'])->name('procurements.approve');
    Route::put('/procurements/{id}/reject', [ProcurementController::class, 'reject'])->name('procurements.reject');
});