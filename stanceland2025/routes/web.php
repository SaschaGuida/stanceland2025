<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventApplicationController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('event', function () {
    return view('event');
})->name(name: 'event');

Route::get('/events/nord', function () {
    return view('events.eventonord');
})->name('events.eventonord');

Route::get('/events/sud', function () {
    return view('events.eventosud');
})->name('events.eventosud');


Route::match(['get', 'post'], '/events/applications', [EventApplicationController::class, 'handle'])->name('events.applications');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('contact', function () {
    return view('contact');
})->name('contact');

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/nord', [AdminController::class, 'nord'])->name('nord');
    Route::get('/sud', [AdminController::class, 'sud'])->name('sud');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/eventi', [AdminController::class, 'eventi'])->name('eventi');
});

require __DIR__ . '/auth.php';

/* test */