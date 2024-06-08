<?php

use App\Enums\Permission;
use App\Livewire\Pages\Dashboard\Pages\Index\Pages\Index as DashboardIndex;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth' , 'permission:'. Permission::DashboardAccess->value])->group(function(){

    Route::get('/', DashboardIndex::class)->name('index');

    Route::get('/settings', DashboardIndex::class)->name('settings');

});


