<?php

use App\Enums\Permission;
use App\Enums\Role;
use App\Livewire\Pages\Dashboard\Pages\Index\Pages\Index as DashboardIndex;
use App\Livewire\Pages\Dashboard\Pages\Profile\Pages\Index as ProfileIndex;
use App\Livewire\Pages\Dashboard\Pages\Notifications\Pages\Index as NotificationsIndex;
use App\Livewire\Pages\Dashboard\Pages\Notifications\Pages\Create as CreateNotification;
use App\Livewire\Pages\Dashboard\Pages\Notifications\Pages\Sent as SentNotifications;
use App\Livewire\Pages\Admin\Pages\Users\Pages\Index as UsersIndex;
use App\Livewire\Pages\Users\Pages\Vacations\Pages\Index as VacationIndex;
use App\Livewire\Pages\Users\Pages\AdvancePayments\Pages\Index as AdvancePaymentsIndex;
use App\Livewire\Pages\Admin\Pages\HR\Pages\Index as HrIndex;
use App\Livewire\Pages\Admin\Pages\AdvancePayments\Pages\Index as AdvancePaymentsAdminIndex;
use App\Livewire\Pages\Admin\Pages\Vacations\Pages\Index as VacationsAdminIndex;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth' , 'permission:'. Permission::DashboardAccess->value])->group(function(){
    Route::get('/', DashboardIndex::class)->name('index');
    Route::get('/settings', DashboardIndex::class)->name('settings');
    Route::get('/profile', ProfileIndex::class)->name('profile');


    Route::prefix('users')->name('users.')->middleware('permission:'. Permission::ManageUsers->value)->group(function(){
        Route::get('/', UsersIndex::class)->name('index');
    });


    Route::prefix('hr')->name('hr.')->middleware('permission:'. Permission::ManageHR->value)->group(function(){
        Route::get('/', HrIndex::class)->name('index');
    });

    Route::prefix('notifications')->name('notifications.')->middleware('permission:'. Permission::ManageNotifications->value)->group(function(){
//        Route::get('/', NotificationsIndex::class)->name('index');
//        Route::get('/new', CreateNotification::class)->name('new');
//        Route::get('/sent', SentNotifications::class)->name('sent');
        Route::get('/manage', NotificationsIndex::class)->name('manage');
    });


    Route::prefix('requests')->name('requests.')->middleware('role:'. Role::User->value)->group(function(){
        Route::get('/vacations', VacationIndex::class)->name('vacation');
        Route::get('/advance-payments', AdvancePaymentsIndex::class)->name('advance-payments');
    });

    Route::prefix('requests')->name('requests.admin.')->middleware(['role:'. Role::Admin->value .'|'.Role::HR->value])->group(function(){
        Route::get('/vacations/manage', VacationsAdminIndex::class)->name('vacation');
        Route::get('/advance-payments/manage', AdvancePaymentsAdminIndex::class)->name('advance-payments');
    });

});


