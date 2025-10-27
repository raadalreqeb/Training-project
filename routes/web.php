<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminReservationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;



// Authentication
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::resource('rooms', RoomsController::class);
Route::get('/rooms', [RoomsController::class, 'indexuser'])->name('rooms.index-user');
Route::get('/rooms/{id}', [RoomsController::class, 'rooms']);






Route::middleware('auth')->group(function () {
    Route::get('/rooms/{room}/reservation/create', [ReservationsController::class, 'create'])->name('reservations.create');
    Route::post('/rooms/{room}/reservation/preview', [ReservationsController::class, 'preview'])->name('reservations.preview');
    Route::post('/rooms/{room}/reservation', [ReservationsController::class, 'store'])->name('reservations.store');
    Route::get('/my-reservations', [ReservationsController::class, 'index'])->name('reservations.index');
    Route::delete('/reservations/{reservation}', [ReservationsController::class, 'destroy'])->name('reservations.destroy');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

});




Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {

    // Admin Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    //Route::get('/reservations', [AdminController::class, 'allReservations'])->name('admin.reservations.index');

    // Rooms Routes
    Route::prefix('rooms')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.rooms.index'); // same as dashboard
        Route::get('/create', [AdminController::class, 'create'])->name('admin.rooms.create');
        Route::post('/', [AdminController::class, 'store'])->name('admin.rooms.store');
        Route::get('/{room}', [AdminController::class, 'show'])->name('admin.rooms.show');
        Route::get('/{room}/edit', [AdminController::class, 'edit'])->name('admin.rooms.edit');
        Route::put('/{room}', [AdminController::class, 'update'])->name('admin.rooms.update');
        Route::delete('/{room}', [AdminController::class, 'destroy'])->name('admin.rooms.destroy');
    });

    // Create Admin
    Route::post('/create-admin', [AdminController::class, 'createAdmin'])->name('create.admin');
});


Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/reservations', [AdminReservationController::class, 'allReservations'])
        ->name('admin.reservations.index');


    Route::get('/reservations/{reservation}/edit', [AdminReservationController::class, 'edit'])
        ->name('admin.reservations.edit');

    Route::put('/reservations/{reservation}', [AdminReservationController::class, 'update'])
        ->name('admin.reservations.update');


    Route::delete('/reservations/{reservation}', [AdminReservationController::class, 'destroyreservation'])
        ->name('admin.reservations.destroy');
});

// Google OAuth
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');
Route::get('/', function () {
    return view('home');
});
