<?php

use App\Http\Controllers\ShiftsController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\LoginController;
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
// shifts
Route::post('/shift', [ShiftsController::class, 'create'])->middleware('auth');
Route::get('/shifts/{shift}/edit', [ShiftsController::class, 'edit'])->middleware('auth');
Route::get('/shifts', [ShiftsController::class, 'index'])->middleware('auth');
Route::get('/shifts/new', [ShiftsController::class, 'new'])->middleware('auth');
Route::put('/shifts/{shift}', [ShiftsController::class, 'update'])->middleware('auth');
// invoices
Route::post('/invoice', [InvoicesController::class, 'create'])->middleware('auth');
Route::get('/invoice/{invoice}', [InvoicesController::class, 'show'])->middleware('auth');
Route::get('/invoices', [InvoicesController::class, 'index'])->middleware('auth');
Route::get('/invoices/new', [InvoicesController::class, 'new'])->middleware('auth');
Route::get('/invoice/{invoice}/destroy', [InvoicesController::class, 'destroy'])->middleware('auth');
Route::get('/invoice/download/{invoice}', [InvoicesController::class, 'download'])->middleware('auth');
// expenses
Route::get('/expenses', [ExpensesController::class, 'index'])->middleware('auth');
// companies
Route::post('/company', [CompaniesController::class, 'create'])->middleware('auth');
Route::get('/company/{company}', [CompaniesController::class, 'show'])->middleware('auth');
Route::get('/companies', [CompaniesController::class, 'index'])->middleware('auth');
Route::get('/companies/new', [CompaniesController::class, 'new'])->middleware('auth');
Route::get('/company/{company}/destroy', [CompaniesController::class, 'destroy'])->middleware('auth');

Auth::routes();
