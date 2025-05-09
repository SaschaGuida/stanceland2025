<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/events/applications', function () {
    return view('events.applications');
})->name('events.applications');

Route::get('contact', function () {
    return view('contact');
})->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

/* test */