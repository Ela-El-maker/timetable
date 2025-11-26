<?php

use App\Http\Controllers\Admin\ConflictController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\TimetableController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\User\ScheduleController;
use App\Http\Controllers\User\UnitInputController;
use Illuminate\Support\Facades\Route;

Route::get('/', UnitInputController::class)->name('units.form');
Route::post('/extract', [ScheduleController::class, 'store'])->name('units.extract');

Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
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
