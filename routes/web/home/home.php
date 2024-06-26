<?php

use App\Http\Controllers\CarouselController;
use App\Livewire\Pages\Home\Pages\Index\Pages\Index as HomeIndex;
use App\Livewire\Pages\Home\Pages\About\Pages\Index as AboutIndex;
use App\Livewire\Pages\Home\Pages\Branches\Pages\Index as BranchesIndex;

use Illuminate\Support\Facades\Route;

Route::name('home.')->group(function(){
    Route::get('/', HomeIndex::class)->name('index');
    Route::get('/about', AboutIndex::class)->name('about');
    Route::get('/branches', BranchesIndex::class)->name('branches');

    Route::get('/slider-home', [CarouselController::class, 'getHomeImages']);
    Route::get('/slider-branches', [CarouselController::class, 'getBranchesImages']);
    Route::get('/slider-about', [CarouselController::class, 'getAboutImages']);
});
