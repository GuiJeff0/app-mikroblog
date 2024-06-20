<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class,'index'])->name('home');
Route::get('/gui', function(){
    return view('gui');
});