<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApproverController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;

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

// Route::middleware(['guest'])->group(function(){
//     Route::get('/', [SesiController::class, 'index'])-> name('login');
//     Route::post('/', [SesiController::class, 'login']);
// });

// Route::get('/home', function(){
//     return redirect('/admin');
// });

// Route::middleware(['auth'])->group(function(){
//     Route::get('/admin', [AdminController::class, 'index']);
//     Route::get('/logout', [SesiController::class, 'logout']);
// });


Route::get('/login', [SesiController::class, 'index'])->name('login');
Route::get('/register', [SesiController::class, 'register'])->name('register');
Route::post('/login', [SesiController::class, 'login']);
Route::get('/logout', [SesiController::class, 'logout'])->name('logout');



Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
});

Route::middleware(['auth', 'role:approver'])->group(function () {
    Route::get('/approver', [ApproverController::class, 'index']);
});