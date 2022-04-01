<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UserController::class, 'index'])->name('home');



Route::middleware('auth')->group(function () {
    Route::resource('roles', RoleController::class)->except(['destroy']);
    Route::delete('/roles/sil', [RoleController::class, 'destroy'])->name('roles.destroy');
    Route::resource('permission', PermissionController::class)->except(['destroy']);
    Route::delete('/permission/sil', [PermissionController::class, 'destroy'])->name('permission.destroy');
    Route::resource('users', UserController::class)->except(['destroy']);
    Route::delete('/users/sil', [UserController::class, 'destroy'])->name('users.destroy');
});




Route::get('home', [UserController::class, 'index']);
require __DIR__.'/auth.php';
