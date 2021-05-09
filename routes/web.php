<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
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

Auth::routes();
Route::middleware(['auth','role:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');
    
        Route::get('barang/export-excel',[BarangController::class, 'exportExcel'])->name('barang.excel');
        Route::resource('barang' ,BarangController::class);
    });
});

Route::middleware(['auth','role:petugas'])->group(function(){
    Route::view('petugas','petugas/index')->name('petugas.index');
});