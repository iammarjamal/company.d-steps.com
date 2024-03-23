<?php

// Uses
use App\Http\Controllers\General\LanguageController;
use Illuminate\Support\Facades\Route;

// Language
Route::prefix('lang')->group(function(){
    Route::get('/{lang}', [LanguageController::class , 'index'])->name('lang');
});