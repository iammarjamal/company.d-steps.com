<?php

namespace App\Livewire\Pages\Dashboard\Pages\Index;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('pages.dashboard.pages.index.index')
        ->layout('layouts.dashboard.layout') 
        ->title(trans('app.dashboard.index.title'));
    }
}
