<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Home\Pages\Index\Pages\Index;

Route::name('home.')->group(function(){
    Route::get('/', Index::class)->name('index');
});