<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class,'index'])->name('home');

//Ideas Routes
Route::get('/ideas/{idea}', [IdeaController::class,'show'])->name('idea.show');
Route::post('/ideas', [IdeaController::class,'store'])->name('idea.store');
Route::delete('/ideas/{idea}', [IdeaController::class,'destroy'])->name('idea.destroy');
Route::get('/ideas/{idea}/edit', [IdeaController::class,'edit'])->name("idea.edit");
Route::put("/ideas/{idea}", [IdeaController::class,"update"])->name('idea.update');

// Comments Routes

Route::post('/ideas/{idea}/comments', [CommentController::class,'store'])->name('idea.comments.store');