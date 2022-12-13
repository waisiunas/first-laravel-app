<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'show_home'])->name('home');

Route::get('/login', [AuthController::class, 'login_view'])->name('login');
Route::get('/users', [AuthController::class, 'login_view'])->name('login');
Route::get('/user/add', [AuthController::class, 'login_view'])->name('login');
Route::get('/user/edit', [AuthController::class, 'login_view'])->name('login');
Route::get('/user/delete', [AuthController::class, 'login_view'])->name('login');

Route::get('/register',[AuthController::class, 'register_view'])->name('register');