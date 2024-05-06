<?php

namespace App\Livewire\Pages\Home\Pages\Branches\Pages;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('pages.home.pages.branches.pages.index')
        ->layout('pages.home.layouts.layout') 
        ->title(trans('app.home.branches.title'));
    }
}
