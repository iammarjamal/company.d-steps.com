<?php

use App\Enums\Permission;
use App\Enums\Role;
use App\Livewire\Pages\Users\Pages\AdvancePayments\Pages\Index as AdvancePaymentsIndex;
use App\Livewire\Pages\Users\Pages\Notifications\Pages\Index as NotificationsIndex;
use App\Livewire\Pages\Users\Pages\Profile\Pages\Index as ProfileIndex;
use App\Livewire\Pages\Users\Pages\Vacations\Pages\Index as VacationIndex;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->name('user.')->middleware(['auth' , 'role:'. Role::User->value])->group(function(){

    Route::get('/profile', ProfileIndex::class)->name('profile');

    Route::prefix('notifications')->name('notifications.')->middleware('permission:'. Permission::ManageNotifications->value)->group(function(){
        Route::get('/manage', NotificationsIndex::class)->name('manage');
    });

    Route::prefix('requests')->name('requests.')->group(function(){
        Route::get('/vacations', VacationIndex::class)->name('vacation');
        Route::get('/advance-payments', AdvancePaymentsIndex::class)->name('advance-payments');
    });


});


