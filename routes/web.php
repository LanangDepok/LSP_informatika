<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

//login
Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'login')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate')->middleware('guest')->name('authenticate')->middleware('guest');
    Route::post('/logout', 'logout')->middleware('auth')->name('logout')->middleware('auth');
});

Route::middleware('auth')->controller(DataController::class)->group(function () {
    //dashboard
    Route::get('/dashboard', 'dashboard')->name('dashboard');

    //Kelola data mahasiswa di admin
    Route::get('/getAllMahasiswa', 'getAllMahasiswa')->name('getAllMahasiswa');
    Route::get('/getMahasiswa/{user}', 'getMahasiswa')->name('getMahasiswa');
    Route::get('/createMahasiswa', 'createMahasiswa')->name('createMahasiswa');
    Route::post('/storeMahasiswa', 'storeMahasiswa')->name('storeMahasiswa');
    Route::get('/editMahasiswa/{user}/edit', 'editMahasiswa')->name('editMahasiswa');
    Route::put('/updateMahasiswa/{user}', 'updateMahasiswa')->name('updateMahasiswa');
    Route::delete('/deleteMahasiswa/{user}', 'deleteMahasiswa')->name('deleteMahasiswa');

    //kelola data pendaftaran mahasiswa di admin
    Route::get('/getAllPendaftaran', 'getAllPendaftaran')->name('getAllPendaftaran');

    //pendaftaran untuk mahasiswa
    Route::get('/pendaftaranMahasiswa', 'pendaftaranMahasiswa')->name('pendaftaranMahasiswa');
    Route::put('/ajukanPendaftaran/{user}', 'ajukanPendaftaran')->name('ajukanPendaftaran');
});
