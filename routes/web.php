<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::prefix('admin')->controller(AdminController::class)->middleware(['auth'])->group(function(){
    Route::get('/dashboard','admin_dashboard')->name('admin.dashboard');
    Route::get('/room','all_room')->name('all.room');
    Route::post('/add/room','add_room')->name('add.room');
    Route::post('/update/room','update_room')->name('update.room');
});


Route::controller(UserController::class)->group(function(){
    Route::get('/','home')->name('site.home');
    Route::get('/dashboard','user_dashboard')->middleware(['auth', 'verified'])->name('dashboard');
});
