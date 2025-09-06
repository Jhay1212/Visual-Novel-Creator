<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\GameController;

Route::get("/games", [GameController::class, "index"])->name("games");
Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');
Route::get("/game/{game}", [GameController::class,"show"])->name("show-game")
->middleware('auth', "is_author");

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
