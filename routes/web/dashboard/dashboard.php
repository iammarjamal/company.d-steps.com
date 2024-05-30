<?php

use App\Enums\Permission;
use App\Livewire\Pages\Dashboard\Pages\Index\Pages\Index as DashboardIndex;
use App\Livewire\Pages\Dashboard\Pages\Users\Pages\Index as UsersIndex;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth' , 'permission:'. Permission::DashboardAccess->value])->group(function(){
    Route::get('/', DashboardIndex::class)->name('index');
    Route::get('/settings', DashboardIndex::class)->name('settings');
    Route::get('/profile', DashboardIndex::class)->name('profile');


    Route::prefix('users')->name('users.')->middleware('auth')->group(function(){
        Route::get('/', UsersIndex::class)->name('index');
    });


    Route::prefix('hr')->name('hr.')->middleware('auth')->group(function(){
        Route::get('/', DashboardIndex::class)->name('index');
    });

});


