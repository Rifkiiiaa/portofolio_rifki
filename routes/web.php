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
    Route::get('/services/{service}/edit', [AdminController::class, 'serviceEdit'])->name('services.edit');
    Route::put('/services/{service}', [AdminController::class, 'serviceUpdate'])->name('services.update');
    Route::delete('/services/{service}', [AdminController::class, 'serviceDestroy'])->name('services.destroy');

    Route::get('/educations', [AdminController::class, 'educationIndex'])->name('educations');
    Route::post('/educations', [AdminController::class, 'educationStore'])->name('educations.store');
    Route::get('/educations/{education}/edit', [AdminController::class, 'educationEdit'])->name('educations.edit');
    Route::put('/educations/{education}', [AdminController::class, 'educationUpdate'])->name('educations.update');
    Route::delete('/educations/{education}', [AdminController::class, 'educationDestroy'])->name('educations.destroy');

    Route::get('/certifications', [AdminController::class, 'certificationIndex'])->name('certifications');
    Route::post('/certifications', [AdminController::class, 'certificationStore'])->name('certifications.store');
    Route::get('/certifications/{certification}/edit', [AdminController::class, 'certificationEdit'])->name('certifications.edit');
    Route::put('/certifications/{certification}', [AdminController::class, 'certificationUpdate'])->name('certifications.update');
    Route::delete('/certifications/{certification}', [AdminController::class, 'certificationDestroy'])->name('certifications.destroy');

    Route::get('/experiences', [AdminController::class, 'experienceIndex'])->name('experiences');
    Route::post('/experiences', [AdminController::class, 'experienceStore'])->name('experiences.store');
    Route::get('/experiences/{experience}/edit', [AdminController::class, 'experienceEdit'])->name('experiences.edit');
    Route::put('/experiences/{experience}', [AdminController::class, 'experienceUpdate'])->name('experiences.update');
    Route::delete('/experiences/{experience}', [AdminController::class, 'experienceDestroy'])->name('experiences.destroy');

    Route::get('/account', [AdminController::class, 'accountEdit'])->name('account');
    Route::put('/account', [AdminController::class, 'accountUpdate'])->name('account.update');
});
