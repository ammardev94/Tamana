<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Parent\AuthController;
use App\Http\Controllers\Parent\ProfileController;
use App\Http\Controllers\Parent\DashboardController;
use App\Http\Controllers\Parent\NotificationController;

Route::group(['prefix' => 'parent'], function () {

    Route::get('/login', [AuthController::class, 'login'])->name('parent.login');
    Route::post('/login', [AuthController::class, 'login_attempt'])->name('parent.login.attempt');
    Route::get('/forgot-password', [AuthController::class, 'forgot_password'])->name('parent.forgot.password');
    Route::post('/forgot-password', [AuthController::class, 'forgot_password_attempt'])->name('parent.forgot.password.attempt');
    Route::get('/reset-password/{token}', [AuthController::class, 'reset_password'])->name('parent.reset.password');
    Route::post('/reset-password', [AuthController::class, 'reset_password_attempt'])->name('parent.reset.password.attempt'); 

    Route::group(['middleware'    => 'roleAuth:parent'], function () {

        Route::get('/', [DashboardController::class, 'index'])->name('parent.dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('parent.logout');

        Route::get('/profile', [ProfileController::class, 'index'])->name('parent.profile.index');
        Route::put('/profile', [ProfileController::class, 'update'])->name('parent.profile.update');
        
        Route::get('/notification', [NotificationController::class, 'index'])->name('parent.notification.index');
        Route::get('/notification/read-all', [NotificationController::class, 'markAllAsRead'])->name('parent.notification.mark-all-read');
        Route::get('/notification/delete-all', [NotificationController::class, 'deleteAll'])->name('parent.notification.delete-all');
        Route::get('/notification/{id}/delete', [NotificationController::class, 'delete'])->name('parent.notification.delete');
        

    });
});
