<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialController;
use Illuminate\Support\Facades\Route;

// Admin Authentication Routes (No Auth Middleware)
Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
});

// Admin Protected Routes (Requires Auth)
Route::prefix('admin')->middleware('auth')->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Portfolio Management
    Route::prefix('portfolio')->name('admin.portfolio.')->group(function () {
        Route::get('/', [PortfolioController::class, 'index'])->name('index');
        Route::get('/create', [PortfolioController::class, 'create'])->name('create');
        Route::post('/', [PortfolioController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [PortfolioController::class, 'edit'])->name('edit');
        Route::put('/{id}', [PortfolioController::class, 'update'])->name('update');
        Route::delete('/{id}', [PortfolioController::class, 'destroy'])->name('destroy');
    });

    // Services Management
    Route::prefix('services')->name('admin.services.')->group(function () {
        Route::get('/', [ServiceController::class, 'index'])->name('index');
        Route::get('/create', [ServiceController::class, 'create'])->name('create');
        Route::post('/', [ServiceController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ServiceController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ServiceController::class, 'update'])->name('update');
        Route::delete('/{id}', [ServiceController::class, 'destroy'])->name('destroy');
    });

    // Team Management
    Route::prefix('team')->name('admin.team.')->group(function () {
        Route::get('/', [TeamController::class, 'index'])->name('index');
        Route::get('/create', [TeamController::class, 'create'])->name('create');
        Route::post('/', [TeamController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [TeamController::class, 'edit'])->name('edit');
        Route::put('/{id}', [TeamController::class, 'update'])->name('update');
        Route::delete('/{id}', [TeamController::class, 'destroy'])->name('destroy');
    });

    // Testimonials Management
    Route::prefix('testimonials')->name('admin.testimonials.')->group(function () {
        Route::get('/', [TestimonialController::class, 'index'])->name('index');
        Route::get('/create', [TestimonialController::class, 'create'])->name('create');
        Route::post('/', [TestimonialController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [TestimonialController::class, 'edit'])->name('edit');
        Route::put('/{id}', [TestimonialController::class, 'update'])->name('update');
        Route::delete('/{id}', [TestimonialController::class, 'destroy'])->name('destroy');
    });

    // Enquiries Management
    Route::prefix('enquiries')->name('admin.enquiries.')->group(function () {
        Route::get('/', [EnquiryController::class, 'index'])->name('index');
        Route::get('/{id}', [EnquiryController::class, 'show'])->name('show');
        Route::put('/{id}', [EnquiryController::class, 'update'])->name('update');
        Route::delete('/{id}', [EnquiryController::class, 'destroy'])->name('destroy');
    });

    // FAQs Management
    Route::prefix('faqs')->name('admin.faqs.')->group(function () {
        Route::get('/', [FAQController::class, 'index'])->name('index');
        Route::get('/create', [FAQController::class, 'create'])->name('create');
        Route::post('/', [FAQController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [FAQController::class, 'edit'])->name('edit');
        Route::put('/{id}', [FAQController::class, 'update'])->name('update');
        Route::delete('/{id}', [FAQController::class, 'destroy'])->name('destroy');
    });

    // Media Management
    Route::prefix('media')->name('admin.media.')->group(function () {
        Route::get('/', [MediaController::class, 'index'])->name('index');
        Route::post('/upload', [MediaController::class, 'upload'])->name('upload');
        Route::delete('/{id}', [MediaController::class, 'destroy'])->name('destroy');
    });

    // Settings Management
    Route::prefix('settings')->name('admin.settings.')->group(function () {
        Route::get('/', [SettingController::class, 'edit'])->name('edit');
        Route::put('/', [SettingController::class, 'update'])->name('update');
    });
});
