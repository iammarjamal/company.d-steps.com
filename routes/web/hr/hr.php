<?php

use App\Enums\Permission;
use App\Enums\Role;
use App\Livewire\Pages\Hr\Pages\Index\Pages\Index as HRIndex;
use App\Livewire\Pages\Hr\Pages\Profile\Pages\Index as ProfileIndex;
use App\Livewire\Pages\Hr\Pages\Notifications\Pages\Index as NotificationsIndex;
use App\Livewire\Pages\Hr\Pages\Vacations\Pages\Index as VacationIndex;
use App\Livewire\Pages\Hr\Pages\AdvancePayments\Pages\Index as AdvancePaymentsIndex;
use Illuminate\Support\Facades\Route;

Route::prefix('hr')->name('hr.')->middleware(['auth' , 'role:'. Role::HR->value])->group(function(){
    Route::get('/', HRIndex::class)->name('index');

    Route::get('/profile', ProfileIndex::class)->name('profile');

    Route::prefix('notifications')->name('notifications.')->middleware('permission:'. Permission::ManageNotifications->value)->group(function(){
        Route::get('/manage', NotificationsIndex::class)->name('manage');
    });

    Route::prefix('requests')->name('requests.')->middleware(['permission:'. Permission::ManageAdvancePayments->value .'|'.Permission::ManageVacations->value])->group(function(){
        Route::get('/vacations/manage', VacationIndex::class)->name('vacation');
        Route::get('/advance-payments/manage', AdvancePaymentsIndex::class)->name('advance-payments');
    });

});
