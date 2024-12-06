<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\GeneratedLetterController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

// Default route to welcome page
//Route::get('/index', function () {
//    return view('index');
//})->name('index');

// Dashboard route
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});

// Resource routes for users, templates, letters, generated_letters, kategori
Route::resource('users', UserController::class);
Route::resource('templates', TemplateController::class);
Route::resource('letters', LetterController::class);
Route::resource('generated_letters', GeneratedLetterController::class);
Route::resource('kategori', KategoriController::class);

Route::get("/test/template", [TemplateController::class, 'testTemplate']);

Route::get('/templates/download/{id}', [TemplateController::class, 'download'])->name('templates.download');

// Additional kategori routes
Route::get('/kategori/export-pdf', [KategoriController::class, 'exportPdf'])->name('kategori.exportPdf');

// Route for letter generation
Route::get('/generate-surat', [LetterController::class, 'generateSurat'])->name('letters.generateSurat');

// Additional user routes for creating and editing
Route::post("/users/create", [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

// Authentication routes (login, register, logout)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
    Route::post('/login', [AuthController::class, 'verify'])->name('auth.verify');
    Route::get('/register', [AuthController::class, 'register'])->name('register.index');
    Route::post('/register', [AuthController::class, 'registerProceed'])->name('register.verify');
    Route::get('/register/activation/{token}', [AuthController::class, 'registerVerify']);
    Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'resetPasswordEmail'])->name('password.email');
    Route::get('/password/confirmation/{token}', [AuthController::class, 'showResetPasswordConfirmation'])->name('password.confirmation');
    Route::post('/password/update/{token}', [AuthController::class, 'updatePassword'])->name('password.update');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
});

Route::get('/logout',[AuthController::class,'logout'])->name('auth.logout');
// Profile route
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index')->middleware('auth');

//frontend
Route::get('/',[\App\Http\Controllers\FrontEndController::class,'index'])->name('frontend.index');
