<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RepliesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

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
Route::get('posts/detailPost/{id}', [PostsController::class, 'detailPost'])->name('posts.detailPost');

Route::post('replies/createReply', [RepliesController::class, 'createReply'])->name('replies.createReply');
Route::put('replies/updateReply', [RepliesController::class, 'updateReply'])->name('replies.updateReply');
Route::delete('replies/deleteReply/{id}', [RepliesController::class, 'deleteReply'])->name('replies.deleteReply');

Route::get('profile', [ProfileController::class, 'myProfile'])->name('profile');
Route::get('profile/{id}', [ProfileController::class, 'getProfile'])->name('profile.getProfile');

Route::put('user/updateName', [UserController::class, 'updateName'])->name('user.updateName');
Route::put('user/updatePassword', [UserController::class, 'updatePassword'])->name('user.updatePassword');