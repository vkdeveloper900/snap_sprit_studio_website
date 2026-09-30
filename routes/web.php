<?php

use App\Http\Controllers\Website\Home\HomeController;
use App\Http\Controllers\Website\PageController;
use Illuminate\Support\Facades\Route;

// Public Website Routes
// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Static Pages
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/work', [PageController::class, 'portfolio'])->name('portfolio');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/team', [PageController::class, 'team'])->name('team');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Contact Form Submission
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');

// Legal Pages
Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');

// Highlight detail — URL uses encrypted id via route model binding
Route::get('/highlight/{highlight}', [PageController::class, 'highlightShow'])->name('highlight.show');

// Admin Routes
require __DIR__ . '/admin.php';
