<?php

namespace App\Livewire\Pages\Dashboard\Pages\Index\Pages;

use Livewire\Component;

class Index extends Component
{

    public function create()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }

    public function render()
    {
        return view('pages.dashboard.pages.index.pages.index')
            ->layout('pages.dashboard.layouts.layout')
            ->title(trans('app.dashboard.index.title'));
    }
}
