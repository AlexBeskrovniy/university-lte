<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['role:admin'])->group(function(){
    Route::get('/admin/admin-panel', [AdminController::class, 'index'])->name('panel');
    Route::get('/admin/admin-panel-educators', [AdminController::class, 'getEducators'])->name('educators');
    Route::get('/admin/admin-panel-students', [AdminController::class, 'getStudents'])->name('students');
    Route::get('/admin/admin-panel-lessons', [AdminController::class, 'getLessons'])->name('lessons');
    Route::resources([
        'lessons' => LessonController::class,
        'subjects' => SubjectController::class,
        'rooms' => RoomController::class,
        'groups' => GroupController::class,
        'users' => UserController::class,
    ]);
});

