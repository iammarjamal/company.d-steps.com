<?php

namespace App\Livewire\Pages\Home\Pages\About\Pages;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('pages.home.pages.about.pages.index')
        ->layout('pages.home.layouts.layout') 
        ->title(trans('app.home.about.title'));
    }
}
