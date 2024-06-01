<?php

namespace App\Livewire\Pages\Dashboard\Pages\Notifications\Pages;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('pages.dashboard.pages.notifications.pages.create')
            ->layout('pages.dashboard.layouts.layout')
            ->title(trans('app.dashboard.profile.title'));
    }
}
