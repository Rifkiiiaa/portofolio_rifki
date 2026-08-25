<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortfolioController::class, 'index'])->name('home');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/files/{file}', [FileController::class, 'show'])->name('file.show');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [AdminController::class, 'profileEdit'])->name('profile');
    Route::put('/profile', [AdminController::class, 'profileUpdate'])->name('profile.update');

    Route::get('/skills', [AdminController::class, 'skillIndex'])->name('skills');
    Route::post('/skills', [AdminController::class, 'skillStore'])->name('skills.store');
    Route::delete('/skills/{skill}', [AdminController::class, 'skillDestroy'])->name('skills.destroy');

    Route::get('/projects', [AdminController::class, 'projectIndex'])->name('projects');
    Route::post('/projects', [AdminController::class, 'projectStore'])->name('projects.store');
    Route::get('/projects/{project}/edit', [AdminController::class, 'projectEdit'])->name('projects.edit');
    Route::put('/projects/{project}', [AdminController::class, 'projectUpdate'])->name('projects.update');
    Route::delete('/projects/{project}', [AdminController::class, 'projectDestroy'])->name('projects.destroy');

    Route::get('/testimonials', [AdminController::class, 'testimonialIndex'])->name('testimonials');
    Route::post('/testimonials', [AdminController::class, 'testimonialStore'])->name('testimonials.store');
    Route::delete('/testimonials/{testimonial}', [AdminController::class, 'testimonialDestroy'])->name('testimonials.destroy');

    Route::get('/services', [AdminController::class, 'serviceIndex'])->name('services');
    Route::post('/services', [AdminController::class, 'serviceStore'])->name('services.store');
    Route::delete('/services/{service}', [AdminController::class, 'serviceDestroy'])->name('services.destroy');
});
