<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\SchoolClass\IndexController;
use App\Http\Controllers\SchoolClass\ShowController;
use App\Http\Controllers\SchoolClass\CreateController;
use App\Http\Controllers\SchoolClass\EditController;
use App\Http\Controllers\SchoolClass\StoreController;
use App\Http\Controllers\SchoolClass\UpdateController;
use App\Http\Controllers\SchoolClass\DestroyController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// autentikasi
Route::get('/login', [AuthController::class, 'loginview'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginpost'])->name('login-post')->middleware('guest');
Route::get('/register', [AuthController::class, 'registerview'])->name('register-view')->middleware('guest');
Route::post('/register', [AuthController::class, 'registerpost'])->name('register-post')->middleware('guest');
route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


Route::name('students.')->middleware(['role:student,teacher', 'auth'])->prefix('students')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('index');
    Route::get('/create', [StudentController::class, 'create'])->name('create');
    Route::post('/', [StudentController::class, 'store'])->name('store');
    Route::get('/{student}', [StudentController::class, 'show'])->name('show');
    Route::get('/{student}/edit', [StudentController::class, 'edit'])->name('edit');
    Route::put('/{student}', [StudentController::class, 'update'])->name('update');
    Route::delete('/{student}', [StudentController::class, 'destroy'])->name('destroy');
});

Route::name('teachers.')->middleware(['role:teacher', 'auth'])->prefix('teachers')->group(function () {
    Route::get('/', [TeacherController::class, 'index'])->name('index');
    Route::get('/create', [TeacherController::class, 'create'])->name('create');
    Route::get('/{id}', [TeacherController::class, 'show'])->name('show')->whereNumber('id');
    Route::get('/{id}/edit', [TeacherController::class, 'edit'])->name('edit');
    Route::post('/', [TeacherController::class, 'store'])->name('store');
    Route::put('/{id}', [TeacherController::class, 'update'])->name('update');
    Route::delete('/{id}', [TeacherController::class, 'destroy'])->name('destroy');
});

Route::name('classes.')->middleware(['role:teacher', 'auth'])->prefix('classes')->group(function () {
    Route::get('/', IndexController::class)->name('index');
    Route::get('/create', CreateController::class)->name('create');
    Route::get('/{id}', ShowController::class)->name('show')->whereNumber('id');
    Route::get('/{id}/edit', EditController::class)->name('edit');
    Route::post('/', StoreController::class)->name('store');
    Route::put('/{id}', UpdateController::class)->name('update');
    Route::delete('/{id}', DestroyController::class)->name('destroy');
});

Route::resource('majors', MajorController::class)->middleware(['role:teacher', 'auth']);