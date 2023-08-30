<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CorruptionReportController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile');

Route::group(['middleware' => ['auth', 'admin']], function () {
    // Admin routes here
    Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/event', [AdminController::class, 'users'])->name('admin.event');
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
});
Route::POST('/submit-corruption-report', [CorruptionReportController::class, 'store'])->name('submit-corruption-report');

Route::get('/reports', [ReportController::class, 'index'])->name('reports');
Route::delete('/reports/{id}', [ReportController::class, 'destroy'])->name('delete-report');
Route::get('/reports/{id}/pdf', [ReportController::class, 'generatePdf'])->name('generate-pdf');

Route::get('/success', [CorruptionReportController::class, 'success'])->name('success');

Route::middleware(['auth'])->group(function () {
    Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('edit-profile');
    Route::post('/update-profile', [ProfileController::class, 'update'])->name('update-profile');
    Route::delete('/delete-account', [UserController::class, 'destroy'])->name('delete-account');
});
