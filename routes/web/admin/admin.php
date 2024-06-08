<?php

use App\Enums\Permission;
use App\Enums\Role;
use App\Livewire\Pages\Admin\Pages\Index\Pages\Index as AdminIndex;
use App\Livewire\Pages\Admin\Pages\Profile\Pages\Index as ProfileIndex;
use App\Livewire\Pages\Admin\Pages\HR\Pages\Index as HrIndex;
use App\Livewire\Pages\Admin\Pages\Users\Pages\Index as UsersIndex;
use App\Livewire\Pages\Admin\Pages\Notifications\Pages\Index as NotificationsIndex;
use App\Livewire\Pages\Admin\Pages\Vacations\Pages\Index as VacationIndex;
use App\Livewire\Pages\Admin\Pages\AdvancePayments\Pages\Index as AdvancePaymentsIndex;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(['auth' , 'role:'. Role::Admin->value])->group(function(){
    Route::get('/', AdminIndex::class)->name('index');

    Route::get('/profile', ProfileIndex::class)->name('profile');

    Route::prefix('users')->name('users.')->middleware('permission:'. Permission::ManageUsers->value)->group(function(){
        Route::get('/', UsersIndex::class)->name('index');
    });


    Route::prefix('hr')->name('hr.')->middleware('permission:'. Permission::ManageHR->value)->group(function(){
        Route::get('/', HrIndex::class)->name('index');
    });

    Route::prefix('notifications')->name('notifications.')->middleware('permission:'. Permission::ManageNotifications->value)->group(function(){
        Route::get('/manage', NotificationsIndex::class)->name('manage');
    });

    Route::prefix('requests')->name('requests.')->middleware(['permission:'. Permission::ManageAdvancePayments->value .'|'.Permission::ManageVacations->value])->group(function(){
        Route::get('/vacations/manage', VacationIndex::class)->name('vacation');
        Route::get('/advance-payments/manage', AdvancePaymentsIndex::class)->name('advance-payments');
    });
});
