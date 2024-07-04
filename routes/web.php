<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class,'index'])->name('home');

//Ideas Routes
Route::get('/ideas/{idea}', [IdeaController::class,'show'])->name('idea.show');
Route::post('/ideas', [IdeaController::class,'store'])->name('idea.store')->middleware('auth');
Route::delete('/ideas/{idea}', [IdeaController::class,'destroy'])->name('idea.destroy')->middleware('auth');
Route::get('/ideas/{idea}/edit', [IdeaController::class,'edit'])->name("idea.edit")->middleware('auth');
Route::put("/ideas/{idea}", [IdeaController::class,"update"])->name('idea.update')->middleware('auth');

// Comments Routes

Route::post('/ideas/{idea}/comments', [CommentController::class,'store'])->name('idea.comments.store');

// Register Routes

Route::get('/register', [AuthController::class,'register'])->name('register');
Route::post('/register', [AuthController::class,'store']);

// Google Signup-in 
Route::get('/google/redirect', [App\Http\Controllers\GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [App\Http\Controllers\GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');

//Login and Logout
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'authenticate']);
Route::post('/logout',[AuthController::class,'logout'])->name('logout');