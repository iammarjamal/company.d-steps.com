<?php

use App\Livewire\Pages\Auth\Pages\Login\Pages\Index as LoginIndex;
use App\Livewire\Pages\Auth\Pages\Register\Pages\Index as RegisterIndex;
use App\Livewire\Pages\Auth\Pages\ForgetPassword\Pages\Index as ForgetPasswordIndex;
use App\Livewire\Pages\Auth\Pages\ResetPassword\Pages\Index as ResetPasswordIndex;
use App\Livewire\Pages\Auth\Pages\Logout\Pages\Index as LogoutIndex;

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->name('auth.')->middleware('guest')->group(function(){
    Route::get('/login', LoginIndex::class)->name('login');
    Route::get('/register', RegisterIndex::class)->name('register');
    Route::get('/forgot-password', ForgetPasswordIndex::class)->name('forgot-password'); 
    Route::get('/reset-password/{token}/{email}', ResetPasswordIndex::class)->name('reset-password'); 
    Route::get('/logout', LogoutIndex::class)->withoutMiddleware('guest')->middleware('auth')->name('logout');
});