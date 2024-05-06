<?php

use App\Livewire\Pages\Admin\Pages\Index\Pages\Index as AdminIndex;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route::get('/', AdminIndex::class)->name('index');
});