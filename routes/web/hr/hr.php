<?php

use App\Livewire\Pages\Hr\Pages\Index\Pages\Index as HRIndex;
use Illuminate\Support\Facades\Route;

Route::prefix('hr')->name('hr.')->middleware('auth')->group(function(){
    Route::get('/', HRIndex::class)->name('index');
});