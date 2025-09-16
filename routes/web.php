<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\CareerController;

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

Route::get('/', [SiteController::class, 'index'])->name('site.index');


Route::post('/careers/store', [CareerController::class, 'store'])->name('careers.store');

Route::prefix('admin')->middleware('roleAuth:admin')->name('admin.')->group(function () {
    
    Route::get('/careers', [CareerController::class, 'index'])->name('careers.index');
    Route::get('/careers/{id}', [CareerController::class, 'show'])->name('careers.show');
    Route::delete('/careers/{id}', [CareerController::class, 'destroy'])->name('careers.destroy');
});

