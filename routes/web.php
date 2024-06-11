<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Auth::routes();

Route::post('posts/createPost', [PostsController::class, 'createPost'])->name('posts.createPost');
Route::put('posts/updatePost', [PostsController::class, 'updatePost'])->name('posts.updatePost');
Route::delete('posts/deletePost/{id}', [PostsController::class, 'deletePost'])->name('posts.deletePost');