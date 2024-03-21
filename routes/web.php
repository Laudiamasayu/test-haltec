<?php

use App\Http\Controllers\JurusanController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'jurusan' ], function() {
    Route::get('/', [JurusanController::class, 'index'])->name('jurusan.index');
    Route::get('/create', [JurusanController::class, 'create'])->name('jurusan.create');
    Route::post('/store', [JurusanController::class, 'store'])->name('jurusan.store');
    Route::get('/edit/{id_jurusan?}', [JurusanController::class, 'edit'])->name('jurusan.edit');
    Route::put('/jurusan/{id_jurusan}', [JurusanController::class, 'update'])->name('jurusan.update');
    Route::post('/storeEdit/{id_jurusan?}', [JurusanController::class, 'storeEdit'])->name('jurusan.storeEdit');
    Route::delete('/delete/{id_jurusan?}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');
});

Route::group(['prefix' => 'siswa' ], function() {
    Route::get('/', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/store', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/edit/{id_siswa?}', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/{id_siswa}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::post('/storeEdit/{id_siswa?}', [SiswaController::class, 'storeEdit'])->name('siswa.storeEdit');
    Route::delete('/delete/{id_siswa?}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
});