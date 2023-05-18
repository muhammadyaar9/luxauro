<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vendor\AccountController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Vendor\OrderController;
use App\Http\Controllers\Vendor\VendorProductController;
use App\Http\Controllers\Vendor\VendorDashboardController;


Route::get('all-merchant', [DashboardController::class, 'allVendor'])->name('allVendor');
Route::get('all-merchant/{id}', [DashboardController::class, 'adminsuspendedVendor'])->name('admin.suspendedVendor');
Route::get('all-merchants/{id}', [DashboardController::class, 'adminactiveVendor'])->name('admin.adminactiveVendor');
Route::get('vendor-dashboard', [VendorDashboardController::class, 'vendorDashboard'])->name('vendorDashboard');
Route::resource('vendor-product', VendorProductController::class);
Route::get('account-request', [AccountController::class, 'accountRequest'])->name('accountRequest');
Route::post('account-request', [AccountController::class, 'accountRequeststore'])->name('accountRequeststore');

Route::post('account-request-update', [AccountController::class, 'accountRequestupdate'])->name('accountRequestupdate');

Route::get('vendor-show', [DashboardController::class, 'vendorshow'])->name('admin.showVendor');

Route::get('vendor-orders', [OrderController::class, 'index'])->name('vendororders');
Route::get('vendor-order-invoice/{id}', [OrderController::class, 'invoice'])->name('vendororder.invoice');


// country state city
Route::post('api/fetch-states', [VendorDashboardController::class, 'fetchState']);
Route::post('api/fetch-cities', [VendorDashboardController::class, 'fetchCity']);
