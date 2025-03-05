<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LanguageTypeController;
use App\Http\Controllers\OriginLanguageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TimelineController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::resource('project', ProjectController::class);
Route::resource('language', LanguageController::class);
Route::resource('originLanguage', OriginLanguageController::class);
Route::resource('languageType', LanguageTypeController::class);
Route::resource('timeline', TimelineController::class);
