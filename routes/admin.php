<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookAuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\BookTagController;
use App\Http\Controllers\Admin\ClassesController;
use App\Http\Controllers\Admin\ClassStudentController;
use App\Http\Controllers\Admin\ClassTimingController;
use App\Http\Controllers\Admin\CourseBookController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CurriculumController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TutorController;
use App\Http\Controllers\Admin\UserController;

Route::group(['prefix' => 'admin'], function () {

    Route::get('/login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login_attempt'])->name('admin.login.attempt');
    Route::get('/forgot-password', [AuthController::class, 'forgot_password'])->name('admin.forgot.password');
    Route::post('/forgot-password', [AuthController::class, 'forgot_password_attempt'])->name('admin.forgot.password.attempt');
    Route::get('/reset-password/{token}', [AuthController::class, 'reset_password'])->name('admin.reset.password');
    Route::post('/reset-password', [AuthController::class, 'reset_password_attempt'])->name('admin.reset.password.attempt'); 

    Route::group(['middleware'    => 'roleAuth:admin'], function () {

        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

        Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile.index');
        Route::put('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
        
        Route::get('/notification', [NotificationController::class, 'index'])->name('admin.notification.index');
        Route::get('/notification/read-all', [NotificationController::class, 'markAllAsRead'])->name('admin.notification.mark-all-read');
        Route::get('/notification/delete-all', [NotificationController::class, 'deleteAll'])->name('admin.notification.delete-all');
        Route::get('/notification/{id}/delete', [NotificationController::class, 'delete'])->name('admin.notification.delete');

    });
});
