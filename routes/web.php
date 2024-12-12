<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\OriginLanguageController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('project', ProjectController::class);
Route::resource('language', LanguageController::class);
Route::resource('originLanguage', OriginLanguageController::class);
