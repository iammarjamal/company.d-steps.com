<?php

namespace App\Livewire\Pages\Home\Pages\Index\Pages;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('pages.home.pages.index.pages.index')
        ->layout('pages.home.layouts.layout') 
        ->title(trans('app.home.index.title'));
    }
}
