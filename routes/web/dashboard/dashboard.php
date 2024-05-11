<?php

use App\Livewire\Pages\Dashboard\Pages\Index\Pages\Index as DashboardIndex;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function(){
    Route::get('/', DashboardIndex::class)->name('index');
    Route::get('/', DashboardIndex::class)->name('settings');
    Route::get('/', DashboardIndex::class)->name('index');
});