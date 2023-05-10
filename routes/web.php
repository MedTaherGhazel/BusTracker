<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Driver;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VoyageController;


Route::resource('voyages', VoyageController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/map', function () {
    return view('map');
});
//students routes
Route::middleware(['auth', 'verified', 'role:1'])
    ->prefix('student')
    ->name('student.')
    ->group(function() {
        Route::get('/timetable', [Student\TimetableController::class, 'index'])
            ->name('timetable');
    });
//driver routes
Route::middleware(['auth', 'verified', 'role:2'])
    ->prefix('driver')
    ->name('driver.')
    ->group(function() {
        Route::get('/timetable', [Driver\TimetableController::class, 'index'])
            ->name('timetable');
        Route::get('/travels', [Driver\TimetableController::class, 'index'])
            ->name('travels');
    });
//admin routes
Route::middleware(['auth', 'verified', 'role:3'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function() {

        Route::get('/home', [Admin\AdminController::class, 'home'])
            ->name('home');

        Route::get('/users', [Admin\AdminController::class, 'users'])
            ->name('users');

            Route::get('/addbus', [Admin\AdminController::class, 'buses'])
            ->name('addbus');
    });


Route::middleware('auth')->group(function () {
     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
 });
require __DIR__.'/auth.php';
