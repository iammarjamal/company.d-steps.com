<?php

namespace App\Livewire\Pages\Hr\Pages\Index\Pages;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('pages.hr.pages.index.pages.index')
            ->layout('pages.hr.layouts.layout');
    }
}
