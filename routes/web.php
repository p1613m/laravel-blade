<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
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

Route::get('/', [SiteController::class, 'index'])->name('home');

/**
 * Auth
 */
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register-send');
Route::get('/auth', [AuthController::class, 'authForm'])->name('auth');
Route::post('/auth', [AuthController::class, 'auth'])->name('auth-send');
Route::middleware('auth')->get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('show-post');

Route::middleware('auth')->group(function() {
    Route::get('/create-post', [PostController::class, 'create'])->name('create-post');
    Route::post('/create-post', [PostController::class, 'store'])->name('create-post-send');
    Route::get('/my-posts', [PostController::class, 'my'])->name('my-posts');
    Route::get('/posts/{post}/delete', [PostController::class, 'delete'])->name('delete-post');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('edit-post');
    Route::post('/posts/{post}/edit', [PostController::class, 'update'])->name('edit-post-send');
});
