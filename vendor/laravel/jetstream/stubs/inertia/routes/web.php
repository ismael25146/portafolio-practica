<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/resume', [PublicController::class, 'resume'])->name('resume');
Route::get('/jobs', [PublicController::class, 'jobs'])->name('jobs');
Route::get('/blog', [PublicController::class, 'blog'])->name('blog');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');