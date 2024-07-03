<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\LevelKamarController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PetugasKamarController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('rooms', RoomController::class);
Route::resource('level-kamar', LevelKamarController::class);
Route::resource('pasien', PasienController::class);
Route::resource('petugas-kamar', PetugasKamarController::class);
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
