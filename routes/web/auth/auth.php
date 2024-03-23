<?php

use App\Livewire\Pages\Auth\Pages\Login\Login;
use App\Livewire\Pages\Auth\Pages\Register\Register;
use App\Livewire\Pages\Auth\Pages\ForgotPassword\ForgotPassword;
use App\Livewire\Pages\Auth\Pages\ResetPassword\ResetPassword;
use App\Livewire\Pages\Auth\Pages\Logout\Logout;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->name('auth.')->middleware('guest')->group(function(){
    Route::get('/login', Login::class)->name('login');

    // Route::get('/register', Register::class)->name('register');

    Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password'); 

    Route::get('/reset-password/{token}/{email}', ResetPassword::class)->name('reset-password'); 

    Route::get('/logout', [Logout::class , 'logout'])->withoutMiddleware('guest')->middleware('auth')->name('logout');
});