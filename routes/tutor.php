<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Tutor\AuthController;
use App\Http\Controllers\Tutor\ProfileController;
use App\Http\Controllers\Tutor\DashboardController;
use App\Http\Controllers\Tutor\NotificationController;

Route::group(['prefix' => 'tutor'], function () {

    Route::get('/login', [AuthController::class, 'login'])->name('tutor.login');
    Route::post('/login', [AuthController::class, 'login_attempt'])->name('tutor.login.attempt');
    Route::get('/forgot-password', [AuthController::class, 'forgot_password'])->name('tutor.forgot.password');
    Route::post('/forgot-password', [AuthController::class, 'forgot_password_attempt'])->name('tutor.forgot.password.attempt');
    Route::get('/reset-password/{token}', [AuthController::class, 'reset_password'])->name('tutor.reset.password');
    Route::post('/reset-password', [AuthController::class, 'reset_password_attempt'])->name('tutor.reset.password.attempt'); 

    Route::group(['middleware'    => 'roleAuth:tutor'], function () {

        Route::get('/', [DashboardController::class, 'index'])->name('tutor.dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('tutor.logout');

        Route::get('/profile', [ProfileController::class, 'index'])->name('tutor.profile.index');
        Route::put('/profile', [ProfileController::class, 'update'])->name('tutor.profile.update');
        
        Route::get('/notification', [NotificationController::class, 'index'])->name('tutor.notification.index');
        Route::get('/notification/read-all', [NotificationController::class, 'markAllAsRead'])->name('tutor.notification.mark-all-read');
        Route::get('/notification/delete-all', [NotificationController::class, 'deleteAll'])->name('tutor.notification.delete-all');
        Route::get('/notification/{id}/delete', [NotificationController::class, 'delete'])->name('tutor.notification.delete');
        

    });
});
