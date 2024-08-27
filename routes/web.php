<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AtasanController;
use App\Http\Controllers\KelolaPegawaiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AutoLogout;
use Illuminate\Support\Facades\Route;


Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware([AutoLogout::class])->group(function () {
    //Atasan Route
    Route::group(['prefix' => 'atasan', 'middleware' => ['atasan'], 'as' => 'atasan.'], function () {
        // Dashboard
        Route::get('/dashboard', [AtasanController::class, 'index'])->name('dashboard');

        Route::prefix('profile')->group(function () {
            Route::get('/', [ProfileController::class, 'index_atasan'])->name('profile');
            Route::get('/edit-profile', [ProfileController::class, 'edit_atasan'])->name('profile-edit');
            Route::put('/update-profile/{id}', [ProfileController::class, 'update_atasan'])->name('profile-update');
        });
    });
    //Admin Route
    Route::group(['prefix' => 'admin', 'middleware' => ['admin'], 'as' => 'admin.'], function () {
        // Dashboard
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

        Route::prefix('profile')->group(function () {
            Route::get('/', [ProfileController::class, 'index_admin'])->name('profile');
            Route::get('/edit-profile', [ProfileController::class, 'edit_admin'])->name('profile-edit');
            Route::put('/update-profile/{id}', [ProfileController::class, 'update_admin'])->name('profile-update');
        });
        Route::prefix('kelola-pegawai')->group(function () {
            Route::get('/', [KelolaPegawaiController::class, 'index'])->name('kelola-pegawai');
            Route::get('/create-pegawai', [KelolaPegawaiController::class, 'create'])->name('kelola-pegawai-create');
            Route::post('/insert-pegawai', [KelolaPegawaiController::class, 'insert'])->name('kelola-pegawai-insert');
            Route::get('/edit-pegawai/{id}', [KelolaPegawaiController::class, 'edit'])->name('kelola-pegawai-edit');
            Route::put('/update-pegawai/{id}', [KelolaPegawaiController::class, 'update'])->name('kelola-pegawai-update');
            Route::get('/delete-pegawai/{id}', [KelolaPegawaiController::class, 'delete'])->name('kelola-pegawai-delete');
            Route::get('/inactive-pegawai/{id}', [KelolaPegawaiController::class, 'inactive'])->name('kelola-pegawai-inactive');
            Route::get('/activate-pegawai/{id}', [KelolaPegawaiController::class, 'activate'])->name('kelola-pegawai-activate');
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
        Route::prefix('tugas')->group(function () {
            Route::get('/not-complite', [TasksController::class, 'not_complite'])->name('tasks-not-complite');
            Route::get('/complite', [TasksController::class, 'complite'])->name('tasks-complite');
            Route::get('/revision', [TasksController::class, 'revision'])->name('tasks-revision');
            Route::get('/task-detail/{id}', [TasksController::class, 'detail'])->name('tasks-detail');
            Route::put('/task-kumpulkan/{id}', [TasksController::class, 'kumpulkan'])->name('tasks-kumpulkan');

        });
    });

});

Route::get('/cex', function () {
    return view('admin.index');
});
