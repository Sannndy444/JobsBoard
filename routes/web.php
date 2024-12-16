<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminJobsController;
use App\Http\Controllers\AdminCompanyController;
use App\Http\Controllers\AdminLocationController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\UserJobsController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\UserHistoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/storage/{nameFile}', [ApplicationController::class, 'downloadResume'])->name('application.download.resume');
Route::get('/storage/{fileName}', [ApplicationController::class, 'downloadCover'])->name('application.download.cover');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->middleware('role:admin')->group(function() {
    Route::resource('home', AdminHomeController::class)->names('admin.home');
    Route::resource('jobs', AdminJobsController::class)->names('admin.jobs');
    Route::resource('location', AdminLocationController::class)->names('admin.location');
    Route::resource('company', AdminCompanyController::class)->names('admin.company');
    Route::resource('type', TypeController::class)->names('admin.type');
    Route::resource('application', ApplicationController::class)->names('admin.application');

    Route::patch('/application/accepted/{id}', [ApplicationController::class, 'accepted'])->name('application.accepted');
    Route::patch('/application/rejected/{id}', [ApplicationController::class, 'rejected'])->name('application.rejected');
    
});

Route::prefix('user')->middleware('role:user|admin')->group(function() {
    Route::resource('home', UserHomeController::class)->names('user.home');
    Route::resource('jobs', UserJobsController::class)->names('user.jobs');
    Route::resource('history', UserHistoryController::class)->names('user.history');
    Route::get('/jobs/assign/{id}', [UserJobsController::class, 'assign'])->name('user.jobs.assign');
});

require __DIR__.'/auth.php';
