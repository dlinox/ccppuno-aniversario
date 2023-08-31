<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SupervisorController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return Inertia::render('index');
});

Route::name('auth.')->prefix('')->group(function () {
    Route::get('/login',  [AuthController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/sign-in',  [AuthController::class, 'signIn'])->name('sign-in');
    Route::delete('/sign-out',  [AuthController::class, 'signOut'])->name('sign-out');
});

Route::middleware('auth')->name('a.')->prefix('a')->group(function () {
    Route::get('', [AdminController::class, 'index'])->name('index');
    Route::get('/pagos', [AdminController::class, 'payments'])->name('payments');
    Route::post('/pagos/validar', [AdminController::class, 'validatePayment'])->name('validate.payment');
    Route::get('/configuraciones', [AdminController::class, 'settings'])->name('settings');
});


Route::name('s.')->prefix('s')->group(function () {
    Route::get('', [SupervisorController::class, 'index'])->name('index'); //Dasboard
});


Route::resource('sales', SalesController::class);
Route::post('/success', [SalesController::class, 'success'])->name('success');

Route::get('/share', [SalesController::class, 'share'])->name('share');
Route::post('/download', [SalesController::class, 'download'])->name('download');
Route::get('/download/{token}', [SalesController::class, 'downloadPDF'])->name('downloadPDF');
