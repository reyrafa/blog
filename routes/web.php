<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
    Route::resource('posts', PostController::class)->except(['index']);
    Route::resource('comments', CommentController::class)->except('store', 'update');
    Route::prefix('comments')->name('comments.')->group(function(){
       Route::post('/store/{post}', [CommentController::class, 'store'])->name('store');
       Route::put('/{comment_id}', [CommentController::class, 'update'])->name('update');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
