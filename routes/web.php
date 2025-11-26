<?php

use App\Http\Controllers\Admin\ConflictController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\TimetableController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\User\ScheduleController;
use App\Http\Controllers\User\UnitInputController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:web', 'student'])->group(function () {
    Route::get('/', UnitInputController::class)->name('units.form');
    Route::post('/extract', [ScheduleController::class, 'store'])->name('units.extract');
});

Route::middleware(['auth:admin', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', DashboardController::class)->name('dashboard');

    Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
    Route::post('/users', [UserManagementController::class, 'store'])->name('users.store');
    Route::patch('/users/{user}', [UserManagementController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserManagementController::class, 'destroy'])->name('users.destroy');

    Route::get('/timetables', [TimetableController::class, 'index'])->name('timetables.index');
    Route::post('/timetables', [TimetableController::class, 'store'])->name('timetables.store');
    Route::post('/timetables/{timetable}/activate', [TimetableController::class, 'activate'])->name('timetables.activate');
    Route::delete('/timetables/{timetable}', [TimetableController::class, 'destroy'])->name('timetables.destroy');

    Route::get('/conflicts', [ConflictController::class, 'index'])->name('conflicts.index');
    Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index');
});
Route::get('/login', [UserLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserLoginController::class, 'login'])->name('login.attempt');
Route::post('/logout', [UserLoginController::class, 'logout'])->name('logout');

Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.attempt');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
