<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Student\AuthController;
use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\NotificationController;

Route::group(['prefix' => 'student'], function () {

    Route::get('/login', [AuthController::class, 'login'])->name('student.login');
    Route::post('/login', [AuthController::class, 'login_attempt'])->name('student.login.attempt');
    Route::get('/forgot-password', [AuthController::class, 'forgot_password'])->name('student.forgot.password');
    Route::post('/forgot-password', [AuthController::class, 'forgot_password_attempt'])->name('student.forgot.password.attempt');
    Route::get('/reset-password/{token}', [AuthController::class, 'reset_password'])->name('student.reset.password');
    Route::post('/reset-password', [AuthController::class, 'reset_password_attempt'])->name('student.reset.password.attempt'); 

    Route::group(['middleware'    => 'roleAuth:student'], function () {

        Route::get('/', [DashboardController::class, 'index'])->name('student.dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('student.logout');

        Route::get('/profile', [ProfileController::class, 'index'])->name('student.profile.index');
        Route::put('/profile', [ProfileController::class, 'update'])->name('student.profile.update');
        
        Route::get('/notification', [NotificationController::class, 'index'])->name('student.notification.index');
        Route::get('/notification/read-all', [NotificationController::class, 'markAllAsRead'])->name('student.notification.mark-all-read');
        Route::get('/notification/delete-all', [NotificationController::class, 'deleteAll'])->name('student.notification.delete-all');
        Route::get('/notification/{id}/delete', [NotificationController::class, 'delete'])->name('student.notification.delete');
        

    });
});
