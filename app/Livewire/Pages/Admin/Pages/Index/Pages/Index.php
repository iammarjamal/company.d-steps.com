<?php

namespace App\Livewire\Pages\Admin\Pages\Index\Pages;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('pages.admin.pages.index.pages.index')
            ->layout('pages.admin.layouts.layout');
    }
}
