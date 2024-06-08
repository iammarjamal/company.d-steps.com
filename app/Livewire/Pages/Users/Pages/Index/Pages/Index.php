<?php

namespace App\Livewire\Pages\Users\Pages\Index\Pages;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('pages.users.pages.index.pages.index')
            ->layout('pages.users.layouts.layout');
    }
}
