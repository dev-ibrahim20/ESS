<?php

use App\Http\Controllers\GC\GCController;
use App\Http\Controllers\GC\GradesController;
use App\Http\Controllers\GC\ClassroomsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Students\studentsController;
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

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/// Staf Routes

Route::prefix('students')->middleware('auth')->group(function () {
    Route::get('/', [StudentsController::class, 'index'])->name('students.index');
    Route::get('/create', [StudentsController::class, 'create'])->name('students.create');
    Route::post('/store', [StudentsController::class, 'store'])->name('students.store');
    Route::get('/edit/{id}', [StudentsController::class, 'edit'])->name('students.edit');
    Route::put('/update/{id}', [StudentsController::class, 'update'])->name('students.update');
    Route::delete('/destroy/{id}', [StudentsController::class, 'destroy'])->name('students.destroy');
});

Route::prefix('GC')->middleware('auth')->group(function () {
    Route::get('/', [GCController::class, 'index'])->name('GC.index');
    Route::prefix('grades')->group(function () {
        Route::get('/', [GradesController::class, 'index'])->name('GC.grades.index');
        Route::get('/create', [GradesController::class, 'create'])->name('GC.grades.create');
        Route::post('/store', [GradesController::class, 'store'])->name('GC.grades.store');
        Route::get('/edit/{id}', [GradesController::class, 'edit'])->name('GC.grades.edit');
        Route::put('/update/{id}', [GradesController::class, 'update'])->name('GC.grades.update');
        Route::delete('/destroy/{id}', [GradesController::class, 'destroy'])->name('GC.grades.destroy');
    });
    Route::prefix('classroom')->group(function () {
        Route::get('/', [ClassroomsController::class, 'index'])->name('GC.classrooms.index');
        Route::get('/create', [ClassroomsController::class, 'create'])->name('GC.classrooms.create');
        Route::post('/store', [ClassroomsController::class, 'store'])->name('GC.classrooms.store');
        Route::get('/edit/{id}', [ClassroomsController::class, 'edit'])->name('GC.classrooms.edit');
        Route::put('/update/{id}', [ClassroomsController::class, 'update'])->name('GC.classrooms.update');
        Route::delete('/destroy/{id}', [ClassroomsController::class, 'destroy'])->name('GC.classrooms.destroy');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
