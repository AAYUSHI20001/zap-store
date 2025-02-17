<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

// Authentication routes
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Add auth middleware to protected routes
Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', ProductController::class);
    Route::get('/pos', [SaleController::class, 'pos'])->name('pos');
    Route::get('/get-product', [SaleController::class, 'getProduct'])->name('get.product');
    Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');
    Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');
    Route::get('/sales/{sale}/invoice', [SaleController::class, 'invoice'])->name('sales.invoice');
    Route::get('/sales/{sale}/details', [SaleController::class, 'getDetails'])->name('sales.details');
    Route::resource('suppliers', SupplierController::class);
    Route::resource('purchases', PurchaseController::class);
    Route::get('/purchases/{purchase}/print', [PurchaseController::class, 'print'])->name('purchases.print');
    Route::resource('users', UserController::class);
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/stock', [ReportController::class, 'stock'])->name('reports.stock');
    Route::get('/reports/stock-value', [ReportController::class, 'stockValue'])->name('reports.stock-value');
    Route::get('/settings', function () {
        return view('settings');
    })->name('settings.index');
});

// Remove these duplicate routes as they're already in the auth middleware group
// Route::get('/purchases', function () {
//     return view('purchases');
// })->name('purchases.index');

Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/reports/stock', [ReportController::class, 'stock'])->name('reports.stock');
Route::get('/reports/stock-value', [ReportController::class, 'stockValue'])->name('reports.stock-value');

// Route::get('/settings', function () {
//     return view('settings');
// })->name('settings.index');

Route::get('/logout', function () {
    // Implement logout logic
    return redirect('/login');
})->name('logout');