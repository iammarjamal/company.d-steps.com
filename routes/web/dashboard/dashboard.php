<?php

// General
use App\Livewire\Pages\Dashboard\Pages\Index\Index;
use App\Livewire\Pages\Dashboard\Pages\Profile\Profile;

// Framework
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function(){
    
    Route::get('/', Index::class)->name('index');
    Route::get('/profile', Profile::class)->name('profile');
    
});