<?php

use App\Http\Controllers\ShiftsController;
use App\Http\Controllers\InvoicesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/shift', [ShiftsController::class, 'create']);
Route::get('/shifts/{shift}/edit', [ShiftsController::class, 'edit']);
Route::get('/shifts', [ShiftsController::class, 'index']);
Route::get('/shifts/new', [ShiftsController::class, 'new']);
Route::put('/shifts/{shift}', [ShiftsController::class, 'update']);

Route::post('/invoice', [InvoicesController::class, 'create']);
Route::get('/invoice/{invoice}', [InvoicesController::class, 'show']);
Route::get('/invoices', [InvoicesController::class, 'index']);
Route::get('/invoices/new', [InvoicesController::class, 'new']);
Route::get('/invoice/download/{invoice}', [InvoicesController::class, 'download']);
