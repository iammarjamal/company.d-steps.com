<?php

namespace App\Livewire\Pages\Home\Pages\Index\Pages;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('pages.home.pages.index.pages.index')
        ->layout('layouts.home.layout') 
        ->title(trans('app.home.menu.index'));
    }
}
