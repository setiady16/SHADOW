<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\GeneratedLetterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

/*
|----------------------------------------------------------------------
// Web Routes
|----------------------------------------------------------------------
// Here is where you can register web routes for your application.
// These routes are loaded by the RouteServiceProvider within a group which
// contains the "web" middleware group. Now create something great!
// Default route to welcome page
*/

Route::get('/', function () {
    return view('index');
})->name('index');

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard.index');

// Resource routes for users, templates, letters, and generated_letters
Route::resource('users', UserController::class);
Route::resource('templates', TemplateController::class);
Route::resource('letters', LetterController::class);
Route::resource('generated_letters', GeneratedLetterController::class);

// Additional route for generating surat
Route::get('/generate-surat', [LetterController::class, 'generateSurat'])->name('letters.generateSurat');

// Custom route for creating a user (optional, since resource already covers it)
Route::post("/users/create", [UserController::class, 'store'])->name('users.store');

// Explicit route for editing user
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

// Route to update user
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

// Authentication routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
