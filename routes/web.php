<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TimelineController;



// Home
Route::get('/', function () {
    return view('home');
});

// Report
Route::middleware('auth')->group(function () {
    Route::prefix('reports')->name('report.')->group(function () {
        Route::get('create', [ReportController::class, 'create'])->name('create');
        Route::post('store', [ReportController::class, 'store'])->name('store');
    });
});

// Timeline
Route::get('/timelines', [TimelineController::class, 'index'])->name('timelines.index');
Route::get('timelines/{reports}', [TimelineController::class, 'show'])->name('timelines.show');


// Riwayat
Route::middleware('auth')->group(function () {
    Route::prefix('riwayat')->name('riwayat.')->group(function () {
        Route::get('', [RiwayatController::class, 'index'])->name('index');
        Route::delete('{report}', [RiwayatController::class, 'destroy'])->name('destroy');
    });
});

// Login
Route::middleware('guest')->group(function () {
    Route::prefix('login')->name('login.')->group(function () {
        Route::get('', [LoginController::class, 'index'])->name('index');
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
    });
});

// Register
Route::middleware('guest')->group(function () {
    Route::prefix('register')->name('register.')->group(function () {
        Route::get('', [RegisterController::class, 'index'])->name('index');
        Route::post('store', [RegisterController::class, 'store'])->name('store');
    });
});

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout.user');

// User Profile
Route::middleware('auth')->group(function () {
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('', [UserController::class, 'show'])->name('show');
        Route::patch('', [UserController::class, 'update'])->name('update');
        Route::get('password', [UserController::class, 'editPassword'])->name('password.edit');
        Route::patch('password', [UserController::class, 'updatePassword'])->name('password.update');
    });
});

// Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::prefix('categories')->name('admin.categories.')->group(function () {
        Route::get('create', [CategoryController::class, 'create'])->name('create');
        Route::post('store', [CategoryController::class, 'store'])->name('store');
    });
    Route::prefix('user-reports')->name('admin.user-reports.')->group(function () {
        Route::get('', [AdminController::class, 'show'])->name('show');
        Route::get('{report}', [AdminController::class, 'showReport'])->name('showReport');
        Route::delete('{report}', [AdminController::class, 'destroy'])->name('destroy');
        Route::patch('{report}', [AdminController::class, 'update'])->name('update');
    });
});

// Like
Route::get('/timelines/{report}/like', [LikeController::class, 'count'])->middleware('auth')->name('timelines.like');

// Comment
Route::middleware('auth')->group(function () {
    Route::prefix('timelines')->name('timelines.comments.')->group(function () {
        Route::post('{report}/comment', [CommentController::class, 'store'])->name('store');
        Route::delete('comments/{comment}/destroy', [CommentController::class, 'destroy'])->name('destroy');
    });
});









