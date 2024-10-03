<?php

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
Route::get('/', function () {
    return view('index');
})->name('index');

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard.index');

// Resource routes for users, templates, letters, generated_letters, kategori
Route::resource('users', UserController::class);
Route::resource('templates', TemplateController::class);
Route::resource('letters', LetterController::class);
Route::resource('generated_letters', GeneratedLetterController::class);
Route::resource('kategori', KategoriController::class);

// Additional kategori routes
Route::get('/kategori/export-pdf', [KategoriController::class, 'exportPdf'])->name('kategori.exportPdf');

// Route for letter generation
Route::get('/generate-surat', [LetterController::class, 'generateSurat'])->name('letters.generateSurat');

// Additional user routes for creating and editing
Route::post("/users/create", [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

// Authentication routes (login, register, logout)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.index');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.index');
Route::post('/register', [AuthController::class, 'register']);

// Profile route
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index')->middleware('auth');

//frontend
Route::get('/frontend',[\App\Http\Controllers\FrontEndController::class,'index'])->name('frontend.index');
