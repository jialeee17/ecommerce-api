<?php

use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\ShippingZoneController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ShippingMethodController;
use App\Http\Controllers\ShippingClassController;

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

    Route::prefix('banks')->name('bank.')->group(function () {
        Route::get('/', [BankController::class, 'index'])->name('index');
        Route::post('/', [BankController::class, 'store'])->name('store');
        Route::get('/{bank}', [BankController::class, 'show'])->name('show');
        Route::match(['put', 'patch'], '/{bank}', [BankController::class, 'update'])->name('update');
        Route::delete('/{bank}', [BankController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('bank-accounts')->name('bankAccount.')->group(function () {
        Route::get('/', [BankAccountController::class, 'index'])->name('index');
        Route::post('/', [BankAccountController::class, 'store'])->name('store');
        Route::get('/{bankAccount}', [BankAccountController::class, 'show'])->name('show');
        Route::match(['put', 'patch'], '/{bankAccount}', [BankAccountController::class, 'update'])->name('update');
        Route::delete('/{bankAccount}', [BankAccountController::class, 'destroy'])->name('destroy');
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
        Route::get('/{country}', [CountryController::class, 'show'])->name('show');
    });

    Route::prefix('states')->name('state.')->group(function () {
        Route::get('/', [StateController::class, 'index'])->name('index');
        Route::post('/', [StateController::class, 'store'])->name('store');
        Route::get('/{state}', [StateController::class, 'show'])->name('show');
        Route::match(['put', 'patch'], '/{state}', [StateController::class, 'update'])->name('update');
        Route::delete('/{state}', [StateController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('categories')->name('category.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::post('/', [CategoryController::class, 'store'])->name('store');
        Route::get('/{category}', [CategoryController::class, 'show'])->name('show');
        Route::match(['put', 'patch'], '/{category}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('products')->name('product.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::post('/', [ProductController::class, 'store'])->name('store');
        Route::get('/{product}', [ProductController::class, 'show'])->name('show');
        Route::match(['put', 'patch'], '/{product}', [ProductController::class, 'update'])->name('update');
        Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('tags')->name('tag.')->group(function () {
        Route::get('/', [TagController::class, 'index'])->name('index');
        Route::post('/', [TagController::class, 'store'])->name('store');
        Route::get('/{tag}', [TagController::class, 'show'])->name('show');
        Route::match(['put', 'patch'], '/{tag}', [TagController::class, 'update'])->name('update');
        Route::delete('/{tag}', [TagController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('attributes')->name('attribute.')->group(function () {
        Route::get('/', [AttributeController::class, 'index'])->name('index');
        Route::post('/', [AttributeController::class, 'store'])->name('store');
        Route::get('/{attribute}', [AttributeController::class, 'show'])->name('show');
        Route::match(['put', 'patch'], '/{attribute}', [AttributeController::class, 'update'])->name('update');
        Route::delete('/{attribute}', [AttributeController::class, 'destroy'])->name('destroy');

        Route::prefix('/{attribute}')->group(function () {
            Route::prefix('values')->name('value.')->group(function () {
                Route::get('/', [AttributeController::class, 'indexAttributeValue'])->name('index');
                Route::post('/', [AttributeController::class, 'storeAttributeValue'])->name('store');
                Route::get('/{attributeValue}', [AttributeController::class, 'showAttributeValue'])->name('show');
                Route::match(['put', 'patch'], '/{attributeValue}', [AttributeController::class, 'updateAttributeValue'])->name('update');
                Route::delete('/{attributeValue}', [AttributeController::class, 'destroyAttributeValue'])->name('destroy');
            });
        });
    });

    Route::prefix('settings')->name('setting.')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('index');
        Route::get('/{setting}', [SettingController::class, 'show'])->name('show');
        Route::match(['put', 'patch'], '/{setting}', [SettingController::class, 'update'])->name('update');
        Route::delete('/{setting}', [SettingController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('payment-methods')->name('paymentMethod.')->group(function () {
        Route::get('/', [PaymentMethodController::class, 'index'])->name('index');
        Route::post('/', [PaymentMethodController::class, 'store'])->name('store');
        Route::get('/{paymentMethod}', [PaymentMethodController::class, 'show'])->name('show');
        Route::match(['put', 'patch'], '/{paymentMethod}', [PaymentMethodController::class, 'update'])->name('update');
        Route::delete('/{paymentMethod}', [PaymentMethodController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('addresses')->name('address.')->group(function () {
        Route::get('/', [AddressController::class, 'index'])->name('index');
        Route::post('/', [AddressController::class, 'store'])->name('store');
        Route::get('/{address}', [AddressController::class, 'show'])->name('show');
        Route::match(['put', 'patch'], '/{address}', [AddressController::class, 'update'])->name('update');
        Route::delete('/{address}', [AddressController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('shipping-methods')->name('shippingMethod.')->group(function () {
        Route::get('/', [ShippingMethodController::class, 'index'])->name('index');
        Route::get('/{shippingMethod}', [ShippingMethodController::class, 'show'])->name('show');
        Route::match(['put', 'patch'], '/{shippingMethod}', [ShippingMethodController::class, 'update'])->name('update');
        Route::delete('/{shippingMethod}', [ShippingMethodController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('shipping-zones')->name('shippingZone.')->group(function () {
        Route::get('/', [ShippingZoneController::class, 'index'])->name('index');
        Route::post('/', [ShippingZoneController::class, 'store'])->name('store');
        Route::get('/{shippingZone}', [ShippingZoneController::class, 'show'])->name('show');
        Route::match(['put', 'patch'], '/{shippingZone}', [ShippingZoneController::class, 'update'])->name('update');
        Route::delete('/{shippingZone}', [ShippingZoneController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('shipping-classes')->name('shippingClass.')->group(function () {
        Route::get('/', [ShippingClassController::class, 'index'])->name('index');
        Route::post('/', [ShippingClassController::class, 'store'])->name('store');
        Route::get('/{shippingClass}', [ShippingClassController::class, 'show'])->name('show');
        Route::match(['put', 'patch'], '/{shippingClass}', [ShippingClassController::class, 'update'])->name('update');
        Route::delete('/{shippingClass}', [ShippingClassController::class, 'destroy'])->name('destroy');
    });
});
