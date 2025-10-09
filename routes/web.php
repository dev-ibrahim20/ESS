<?php

use App\Http\Controllers\GC\GCController;
use App\Http\Controllers\GC\GradesController;
use App\Http\Controllers\GC\ClassroomsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Students\studentsController;
use App\Http\Controllers\Teachers\TeachersController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [HomeController::class, 'index'])->middleware(['auth', 'verified', 'admin'])->name('dashboard');

/// Staf Routes

Route::prefix('students')->middleware('auth')->group(function () {
    Route::get('/', [StudentsController::class, 'index'])->name('students.index');
    Route::get('/create', [StudentsController::class, 'create'])->name('students.create');
    Route::post('/store', [StudentsController::class, 'store'])->name('students.store');
    Route::get('/edit/{id}', [StudentsController::class, 'edit'])->name('students.edit');
    Route::put('/update/{id}', [StudentsController::class, 'update'])->name('students.update');
    Route::delete('/destroy/{id}', [StudentsController::class, 'destroy'])->name('students.destroy');
});

Route::prefix('teachers')->middleware('auth')->group(function () {
    Route::get('/', [TeachersController::class, 'index'])->name('teachers.index');
    Route::get('/create', [TeachersController::class, 'create'])->name('teachers.create');
    Route::post('/store', [TeachersController::class, 'store'])->name('teachers.store');
    Route::get('/edit/{id}', [TeachersController::class, 'edit'])->name('teachers.edit');
    Route::put('/update/{id}', [TeachersController::class, 'update'])->name('teachers.update');
    Route::delete('/destroy/{id}', [TeachersController::class, 'destroy'])->name('teachers.destroy');
    Route::get('/show', [TeachersController::class, 'show'])->name('teachers.show');
});

Route::prefix('GC')->name('GC.')->middleware('auth')->group(function () {
    Route::get('/', [GCController::class, 'index'])->name('index');
    Route::prefix('grades')->name('grades.')->group(function () {
        Route::get('/', [GradesController::class, 'index'])->name('index');
        Route::get('/create', [GradesController::class, 'create'])->name('create');
        Route::post('/store', [GradesController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [GradesController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [GradesController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [GradesController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('classroom')->name('classrooms.')->group(function () {
        Route::get('/', [ClassroomsController::class, 'index'])->name('index');
        Route::get('/create', [ClassroomsController::class, 'create'])->name('create');
        Route::post('/store', [ClassroomsController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ClassroomsController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [ClassroomsController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [ClassroomsController::class, 'destroy'])->name('destroy');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
