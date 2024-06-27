<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class,'index'])->name('home');
Route::post('/ideas', [IdeaController::class,'store'])->name('idea.create');
Route::delete('/ideas/{id}', [IdeaController::class,'destroy'])->name('ideas.destroy');