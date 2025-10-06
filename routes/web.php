<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Test;
use Illuminate\Support\Facades\Route;

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

Route::get('/cesar', Test::class)->middleware(['auth', 'verified'])->name('cesar');
Route::get('/homepage', function () {
    return view('home.homepage');
})->name('homepage');

require __DIR__.'/auth.php';
