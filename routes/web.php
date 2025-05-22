<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\EventApplicationController;
use App\Http\Controllers\PublicEventController;
use App\Http\Controllers\ContactController;

// Homepage
Route::get('/', function () {
    return view('welcome');
});

// Pagina eventi pubblici
Route::get('event', [PublicEventController::class, 'index'])->name('event');

// Pagine statiche evento nord e sud
Route::get('/events/nord', fn () => view('events.eventonord'))->name('events.eventonord');
Route::get('/events/sud', fn () => view('events.eventosud'))->name('events.eventosud');
Route::get('/events/giappone', fn () => view('events.eventogiappone'))->name('events.eventogiappone');

// Form selezione eventi (GET e POST)
Route::match(['get', 'post'], '/events/applications', [EventApplicationController::class, 'handle'])->name('events.applications');

// Dashboard dopo login (differenziata in controller)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Vista con i dettagli della selezione per l'utente loggato
Route::get('/user/selection', [DashboardController::class, 'userselection'])
    ->middleware(['auth'])
    ->name('user.userselection');

// Contatti
Route::get('contact', fn () => view('contact'))->name('contact');
Route::post('contact', [ContactController::class, 'send'])->name('contact.send');

// Area profilo utente
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Area amministrazione (protetta da middleware admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/nord', [AdminController::class, 'nord'])->name('nord');
    Route::get('/sud', [AdminController::class, 'sud'])->name('sud');
    Route::get('/giappone', [AdminController::class, 'giappone'])->name('giappone');
    Route::get('/users', [AdminController::class, 'users'])->name('users');

    // Gestione eventi
    Route::get('/eventi', [EventController::class, 'index'])->name('eventi');
    Route::get('/eventi/{event}/edit', [EventController::class, 'edit'])->name('eventi.edit');
    Route::put('/eventi/{event}', [EventController::class, 'update'])->name('eventi.update');

    // Dettagli selezione + azioni
    Route::get('/selezioni/{id}', [AdminController::class, 'dettaglio'])->name('dettaglio');
    Route::post('/selezioni/{id}/aggiorna', [AdminController::class, 'aggiornaSelezione'])->name('selezioni.aggiorna');
});

require __DIR__ . '/auth.php';
