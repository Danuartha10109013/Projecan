<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AutoLogout;
use Illuminate\Support\Facades\Route;


Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware([AutoLogout::class])->group(function () {
    //Admin Route
    Route::group(['prefix' => 'admin', 'middleware' => ['admin'], 'as' => 'admin.'], function () {
        // Dashboard
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

        Route::prefix('profile')->group(function () {
            Route::get('/', [ProfileController::class, 'index_admin'])->name('profile');
            Route::get('/edit-profile', [ProfileController::class, 'edit_admin'])->name('profile-edit');
            Route::put('/update-profile/{id}', [ProfileController::class, 'update_admin'])->name('profile-update');
        });
    });

    //Pegawai Route
    Route::group(['prefix' => 'pegawai', 'middleware' => ['pegawai'], 'as' => 'pegawai.'], function () {

        Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');

        Route::prefix('profile')->group(function () {
            Route::get('/', [ProfileController::class, 'index_pegawai'])->name('profile');
            Route::get('/edit-profile', [ProfileController::class, 'edit_pegawai'])->name('profile-edit');
            Route::put('/update-profile/{id}', [ProfileController::class, 'update_pegawai'])->name('profile-update');

        });
    });

});

Route::get('/cex', function () {
    return view('admin.index');
});
