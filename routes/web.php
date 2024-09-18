<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\GeneratedLetterController;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Default route to welcome page
Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard.index');

Route::resource('users', UserController::class);
Route::resource('templates', TemplateController::class);
Route::resource('letters', LetterController::class);
Route::resource('generated_letters', GeneratedLetterController::class);
Route::get('/generate-surat', [LetterController::class, 'generateSurat'])->name('letters.generateSurat');
