<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Admin Guard
Route::post('admin/login', [AuthController::class, 'adminLogin']);
Route::post('admin/register', [AuthController::class, 'adminRegister']);

// Customer Guard
Route::post('customer/login', [AuthController::class, 'customerLogin']);
Route::post('customer/register', [AuthController::class, 'customerRegister']);

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('admins')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::post('/', [AdminController::class, 'store'])->name('store');
        Route::get('/{admin}', [AdminController::class, 'show'])->name('show');
        Route::match(['put', 'patch'], '/{admin}', [AdminController::class, 'update'])->name('update');
        Route::delete('/{admin}', [AdminController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('customers')->name('customer.')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('index');
        Route::post('/', [CustomerController::class, 'store'])->name('store');
        Route::get('/{customer}', [CustomerController::class, 'show'])->name('show');
        Route::match(['put', 'patch'], '/{customer}', [CustomerController::class, 'update'])->name('update');
        Route::delete('/{customer}', [CustomerController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('countries')->name('country.')->group(function () {
        Route::get('/', [CountryController::class, 'index'])->name('index');
        // Route::post('/', [CountryController::class, 'store'])->name('store');
        Route::get('/{country}', [CountryController::class, 'show'])->name('show');
        // Route::match(['put', 'patch'], '/{country}', [CountryController::class, 'update'])->name('update');
        // Route::delete('/{country}', [CountryController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('categories')->name('category.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::post('/', [CategoryController::class, 'store'])->name('store');
        Route::get('/{category}', [CategoryController::class, 'show'])->name('show');
        Route::match(['put', 'patch'], '/{category}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('tags')->name('tag.')->group(function () {
        Route::get('/', [TagController::class, 'index'])->name('index');
        Route::post('/', [TagController::class, 'store'])->name('store');
        Route::get('/{tag}', [TagController::class, 'show'])->name('show');
        Route::match(['put', 'patch'], '/{tag}', [TagController::class, 'update'])->name('update');
        Route::delete('/{tag}', [TagController::class, 'destroy'])->name('destroy');
    });
});
