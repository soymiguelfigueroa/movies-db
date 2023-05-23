<?php

use App\Http\Controllers\Admin\Controller as AdminController;
use App\Http\Controllers\Admin\ClassificationController as AdminClassificationController;
use App\Http\Controllers\Admin\GenreController as AdminGenreController;
use App\Http\Controllers\Admin\RoleController as AdminRoleController;
use App\Http\Controllers\Admin\EmployeeController as AdminEmployeeController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [AdminProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/classification', [AdminClassificationController::class, 'index'])->name('classification.index');
    Route::get('/classification/create', [AdminClassificationController::class, 'create'])->name('classification.create');
    Route::post('/classification/store', [AdminClassificationController::class, 'store'])->name('classification.store');
    Route::get('/classification/{classification}/show', [AdminClassificationController::class, 'show'])->name('classification.show');
    Route::get('/classification/{classification}/edit', [AdminClassificationController::class, 'edit'])->name('classification.edit');
    Route::put('/classification/{classification}/update', [AdminClassificationController::class, 'update'])->name('classification.update');
    Route::delete('/classification/{classification}/destroy', [AdminClassificationController::class, 'destroy'])->name('classification.destroy');

    Route::get('/genre', [AdminGenreController::class, 'index'])->name('genre.index');
    Route::get('/genre/create', [AdminGenreController::class, 'create'])->name('genre.create');
    Route::post('/genre/store', [AdminGenreController::class, 'store'])->name('genre.store');
    Route::get('/genre/{genre}/show', [AdminGenreController::class, 'show'])->name('genre.show');
    Route::get('/genre/{genre}/edit', [AdminGenreController::class, 'edit'])->name('genre.edit');
    Route::put('/genre/{genre}/update', [AdminGenreController::class, 'update'])->name('genre.update');
    Route::delete('/genre/{genre}/destroy', [AdminGenreController::class, 'destroy'])->name('genre.destroy');

    Route::get('/role', [AdminRoleController::class, 'index'])->name('role.index');
    Route::get('/role/create', [AdminRoleController::class, 'create'])->name('role.create');
    Route::post('/role/store', [AdminRoleController::class, 'store'])->name('role.store');
    Route::get('/role/{role}/show', [AdminRoleController::class, 'show'])->name('role.show');
    Route::get('/role/{role}/edit', [AdminRoleController::class, 'edit'])->name('role.edit');
    Route::put('/role/{role}/update', [AdminRoleController::class, 'update'])->name('role.update');
    Route::delete('/role/{role}/destroy', [AdminRoleController::class, 'destroy'])->name('role.destroy');

    Route::get('/employee', [AdminEmployeeController::class, 'index'])->name('employee.index');
    Route::get('/employee/create', [AdminEmployeeController::class, 'create'])->name('employee.create');
    Route::post('/employee/store', [AdminEmployeeController::class, 'store'])->name('employee.store');
    Route::get('/employee/{employee}/show', [AdminEmployeeController::class, 'show'])->name('employee.show');
    Route::get('/employee/{employee}/edit', [AdminEmployeeController::class, 'edit'])->name('employee.edit');
    Route::put('/employee/{employee}/update', [AdminEmployeeController::class, 'update'])->name('employee.update');
    Route::delete('/employee/{employee}/destroy', [AdminEmployeeController::class, 'destroy'])->name('employee.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin_auth.php';
