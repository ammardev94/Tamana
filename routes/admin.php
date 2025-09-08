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

        Route::get('/users', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/users', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');

        Route::get('/authors', [AuthorController::class, 'index'])->name('admin.author.index');
        Route::get('/authors/create', [AuthorController::class, 'create'])->name('admin.author.create');
        Route::post('/authors', [AuthorController::class, 'store'])->name('admin.author.store');
        Route::get('/authors/{id}/edit', [AuthorController::class, 'edit'])->name('admin.author.edit');
        Route::put('/authors/{id}', [AuthorController::class, 'update'])->name('admin.author.update');
        Route::delete('/authors/{id}', [AuthorController::class, 'destroy'])->name('admin.author.destroy');

        Route::get('/books', [BookController::class, 'index'])->name('admin.book.index');
        Route::get('/books/create', [BookController::class, 'create'])->name('admin.book.create');
        Route::post('/books', [BookController::class, 'store'])->name('admin.book.store');
        Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('admin.book.edit');
        Route::put('/books/{id}', [BookController::class, 'update'])->name('admin.book.update');
        Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('admin.book.destroy');

        Route::get('/book_authors', [BookAuthorController::class, 'index'])->name('admin.book_authors.index');
        Route::get('/book_authors/create', [BookAuthorController::class, 'create'])->name('admin.book_authors.create');
        Route::post('/book_authors', [BookAuthorController::class, 'store'])->name('admin.book_authors.store');
        Route::get('/book_authors/{id}/edit', [BookAuthorController::class, 'edit'])->name('admin.book_authors.edit');
        Route::put('/book_authors/{id}', [BookAuthorController::class, 'update'])->name('admin.book_authors.update');
        Route::delete('/book_authors/{id}', [BookAuthorController::class, 'destroy'])->name('admin.book_authors.destroy');

        Route::get('/subjects', [SubjectController::class, 'index'])->name('admin.subjects.index');
        Route::get('/subjects/create', [SubjectController::class, 'create'])->name('admin.subjects.create');
        Route::post('/subjects', [SubjectController::class, 'store'])->name('admin.subjects.store');
        Route::get('/subjects/{id}/edit', [SubjectController::class, 'edit'])->name('admin.subjects.edit');
        Route::put('/subjects/{id}', [SubjectController::class, 'update'])->name('admin.subjects.update');
        Route::delete('/subjects/{id}', [SubjectController::class, 'destroy'])->name('admin.subjects.destroy');

        Route::get('/curriculum', [CurriculumController::class, 'index'])->name('admin.curriculum.index');
        Route::get('/curriculum/create', [CurriculumController::class, 'create'])->name('admin.curriculum.create');
        Route::post('/curriculum', [CurriculumController::class, 'store'])->name('admin.curriculum.store');
        Route::get('/curriculum/{id}/edit', [CurriculumController::class, 'edit'])->name('admin.curriculum.edit');
        Route::put('/curriculum/{id}', [CurriculumController::class, 'update'])->name('admin.curriculum.update');
        Route::delete('/curriculum/{id}', [CurriculumController::class, 'destroy'])->name('admin.curriculum.destroy');

        Route::get('/tags', [TagController::class, 'index'])->name('admin.tags.index');
        Route::get('/tags/create', [TagController::class, 'create'])->name('admin.tags.create');
        Route::post('/tags', [TagController::class, 'store'])->name('admin.tags.store');
        Route::get('/tags/{id}/edit', [TagController::class, 'edit'])->name('admin.tags.edit');
        Route::put('/tags/{id}', [TagController::class, 'update'])->name('admin.tags.update');
        Route::delete('/tags/{id}', [TagController::class, 'destroy'])->name('admin.tags.destroy');

        Route::get('/book_tags', [BookTagController::class, 'index'])->name('admin.book_tags.index');
        Route::get('/book_tags/create', [BookTagController::class, 'create'])->name('admin.book_tags.create');
        Route::post('/book_tags', [BookTagController::class, 'store'])->name('admin.book_tags.store');
        Route::get('/book_tags/{id}/edit', [BookTagController::class, 'edit'])->name('admin.book_tags.edit');
        Route::put('/book_tags/{id}', [BookTagController::class, 'update'])->name('admin.book_tags.update');
        Route::delete('/book_tags/{id}', [BookTagController::class, 'destroy'])->name('admin.book_tags.destroy');

        Route::get('/courses', [CourseController::class, 'index'])->name('admin.courses.index');
        Route::get('/courses/create', [CourseController::class, 'create'])->name('admin.courses.create');
        Route::post('/courses', [CourseController::class, 'store'])->name('admin.courses.store');
        Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('admin.courses.edit');
        Route::put('/courses/{id}', [CourseController::class, 'update'])->name('admin.courses.update');
        Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('admin.courses.destroy');

        Route::get('/course_books', [CourseBookController::class, 'index'])->name('admin.course_books.index');
        Route::get('/course_books/create', [CourseBookController::class, 'create'])->name('admin.course_books.create');
        Route::post('/course_books', [CourseBookController::class, 'store'])->name('admin.course_books.store');
        Route::get('/course_books/{id}/edit', [CourseBookController::class, 'edit'])->name('admin.course_books.edit');
        Route::put('/course_books/{id}', [CourseBookController::class, 'update'])->name('admin.course_books.update');
        Route::delete('/course_books/{id}', [CourseBookController::class, 'destroy'])->name('admin.course_books.destroy');

        Route::get('/tutors', [TutorController::class, 'index'])->name('admin.tutors.index');
        Route::get('/tutors/create', [TutorController::class, 'create'])->name('admin.tutors.create');
        Route::post('/tutors', [TutorController::class, 'store'])->name('admin.tutors.store');
        Route::get('/tutors/{id}/edit', [TutorController::class, 'edit'])->name('admin.tutors.edit');
        Route::put('/tutors/{id}', [TutorController::class, 'update'])->name('admin.tutors.update');
        Route::delete('/tutors/{id}', [TutorController::class, 'destroy'])->name('admin.tutors.destroy');

        Route::get('/students', [StudentController::class, 'index'])->name('admin.students.index');
        Route::get('/students/create', [StudentController::class, 'create'])->name('admin.students.create');
        Route::post('/students', [StudentController::class, 'store'])->name('admin.students.store');
        Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('admin.students.edit');
        Route::put('/students/{id}', [StudentController::class, 'update'])->name('admin.students.update');
        Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('admin.students.destroy');

        Route::get('/classes', [ClassesController::class, 'index'])->name('admin.classes.index');
        Route::get('/classes/create', [ClassesController::class, 'create'])->name('admin.classes.create');
        Route::post('/classes', [ClassesController::class, 'store'])->name('admin.classes.store');
        Route::get('/classes/{id}/edit', [ClassesController::class, 'edit'])->name('admin.classes.edit');
        Route::put('/classes/{id}', [ClassesController::class, 'update'])->name('admin.classes.update');
        Route::delete('/classes/{id}', [ClassesController::class, 'destroy'])->name('admin.classes.destroy');

        Route::get('/class_students', [ClassStudentController::class, 'index'])->name('admin.class_students.index');
        Route::get('/class_students/create', [ClassStudentController::class, 'create'])->name('admin.class_students.create');
        Route::post('/class_students', [ClassStudentController::class, 'store'])->name('admin.class_students.store');
        Route::get('/class_students/{id}/edit', [ClassStudentController::class, 'edit'])->name('admin.class_students.edit');
        Route::put('/class_students/{id}', [ClassStudentController::class, 'update'])->name('admin.class_students.update');
        Route::delete('/class_students/{id}', [ClassStudentController::class, 'destroy'])->name('admin.class_students.destroy');

        Route::get('/class_timings', [ClassTimingController::class, 'index'])->name('admin.class_timings.index');
        Route::get('/class_timings/create', [ClassTimingController::class, 'create'])->name('admin.class_timings.create');
        Route::post('/class_timings', [ClassTimingController::class, 'store'])->name('admin.class_timings.store');
        Route::get('/class_timings/{id}/edit', [ClassTimingController::class, 'edit'])->name('admin.class_timings.edit');
        Route::put('/class_timings/{id}', [ClassTimingController::class, 'update'])->name('admin.class_timings.update');
        Route::delete('/class_timings/{id}', [ClassTimingController::class, 'destroy'])->name('admin.class_timings.destroy');

    });
});
