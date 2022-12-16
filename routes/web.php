<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\DB;
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

Route::get('/register',[AuthController::class, 'register_view'])->name('register');

// Raw Queries

// Route::get('/users', function() {
//     $result = DB::select('SELECT * FROM users');
//     return dd($result);
// });

// Route::get('/user/create', function() {
//     $result = DB::insert("INSERT INTO users(name, email, password) VALUES(?, ?, ?)", ['Waseem', 'waseem@gmail.com', md5(12345)]);
//     if($result) {
//         return 'Inserted';
//     } else {
//         return 'Failed';
//     }
// });

// Route::get('/user/{id}/update', function($id) {
//     $result = DB::update('UPDATE users SET name="Saifullah" WHERE id=?', [$id]);
//     if($result) {
//         return 'Updated';
//     } else {
//         return 'Failed';
//     }
// });

// Route::get('/user/{id}/delete', function($id){
//     $result = DB::delete('DELETE FROM users WHERE id=?', [$id]);
//     if($result) {
//         return 'Deleted';
//     } else {
//         return 'Failed';
//     }
// });


// Query Builder

// Route::get('/users', function() {
//     $result = DB::table('users')->get();
//     // $result = DB::table('users')->where('id', '>', 1)->get();
//     // $result = DB::table('users')->where('id', 1)->get();
//     // $result = DB::table('users')->whereId(1)->get();
//     return dd($result);
// });

// Route::get('/user/create', function() {
//     $result = DB::table('users')->insert([
//         'name' => 'Waseem',
//         'email' => 'waseem@gmail.com',
//         'password' => md5(12345)
//     ]);
//     if($result) {
//         return 'Inserted';
//     } else {
//         return 'Failed';
//     }
// });

// Route::get('/user/{id}/update', function($id) {
//     $result = DB::table('users')->whereId($id)->update([
//         'name' => 'Waleed'
//     ]);
//     if($result) {
//         return 'Updated';
//     } else {
//         return 'Failed';
//     }
// });

// Route::get('/user/{id}/delete', function($id){
//     $result = DB::table('users')->whereId($id)->delete();
//     if($result) {
//         return 'Deleted';
//     } else {
//         return 'Failed';
//     }
// });

// User Interface

Route::get('/users', [UsersController::class, 'index'])->name('show_users');
Route::get('/user/create', [UsersController::class, 'create'])->name('create_user');
Route::post('/user/create', [UsersController::class, 'store']);

Route::get('/user/{id}/edit', [UsersController::class, 'edit'])->name('edit_user');
Route::post('/user/{id}/edit', [UsersController::class, 'update']);

Route::post('/user/{id}/delete', [UsersController::class, 'destroy'])->name('delete_user');

Route::get('/posts', [PostController::class, 'index'])->name('show_posts');
Route::get('/post/create', [PostController::class, 'create'])->name('create_post');
Route::post('/post/create', [PostController::class, 'store']);

Route::get('/post/{post}/show', [PostController::class, 'show'])->name('single_post');

Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('edit_post');
Route::post('/post/{post}/edit', [PostController::class, 'update']);

Route::post('/post/{post}/delete', [PostController::class, 'destroy'])->name('delete_post');