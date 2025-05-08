<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\ProgramStudiController;
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

Route::get('/', [WelcomeController::class, 'index']);


    // DASHBOARD
    Route::prefix('dashboard')->group(function () {
        Route::get('/', function () {
            $activemenu = 'dashboard';
            return view('dashboard', ['activemenu' => $activemenu]);
        })->name('dashboard');
    });

    // HANYA ADMIN
    Route::middleware('role:admin')->group(function () {

        // PROFILE
        Route::prefix('profile')->group(function () {
            Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });

        // MANAJEMEN DATA
        Route::prefix('pengguna')->group(function () {
            Route::get('/', [PenggunaController::class, 'index'])->name('pengguna.index');
            Route::get('/create', [PenggunaController::class, 'create'])->name('pengguna.create');
        });

        Route::prefix('perusahaan')->name('perusahaan.')->group(function () {
            Route::get('/', [PerusahaanController::class, 'index'])->name('index');
            Route::get('/create', [PerusahaanController::class, 'create'])->name('create');
            Route::post('/', [PerusahaanController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [PerusahaanController::class, 'edit'])->name('edit');
            Route::put('/{id}', [PerusahaanController::class, 'update'])->name('update');
            Route::delete('/{id}', [PerusahaanController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('lowongan')->name('lowongan.')->group(function () {
            Route::get('/', [LowonganController::class, 'index'])->name('index');
            Route::get('/create', [LowonganController::class, 'create'])->name('create');
            Route::post('/', [LowonganController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [LowonganController::class, 'edit'])->name('edit');
            Route::put('/{id}', [LowonganController::class, 'update'])->name('update');
            Route::delete('/{id}', [LowonganController::class, 'destroy'])->name('destroy');
        });

        // // MANAJEMEN MAGANG
        // Route::prefix('periode')->group(function () {
        //     Route::get('/', [PeriodeController::class, 'index'])->name('periode.index');
        // });

        Route::prefix('programstudi')->group(function () {
            Route::get('/', [ProgramStudiController::class, 'index'])->name('programstudi.index');
        });

        // Route::prefix('lowongan')->group(function () {
        //     Route::get('/', [LowonganController::class, 'index'])->name('lowongan.index');
        // });

        // Route::prefix('pengajuan')->group(function () {
        //     Route::get('/', [PengajuanController::class, 'index'])->name('pengajuan.index');
        // });

        // Route::prefix('statistik')->group(function () {
        //     Route::get('/', [StatistikController::class, 'index'])->name('statistik.index');
        // });

    });
Route::middleware(['auth','verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
require __DIR__.'/auth.php';
