<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;

Route::get('/welcome', function () {
    return Inertia::render('Welcome');
});

// Frontend
Route::get('/', function () {
    return Inertia::render('Frontend/Index');
});

// Backend
Route::middleware('auth')->name('dashboard')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});

Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::resource('/posts', PostController::class);
    Route::resource('/categories', CategoryController::class)->except('show');
    Route::resource('/tags', TagController::class)->except('show');
});


Route::middleware(['auth'])->prefix('authorization')->name('authorization.')->group(function () {
    Route::resource('/users', UserController::class)->except('show');
    Route::resource('/roles', RoleController::class)->except('show');
    Route::resource('/permissions', PermissionController::class)->except('show');
});

