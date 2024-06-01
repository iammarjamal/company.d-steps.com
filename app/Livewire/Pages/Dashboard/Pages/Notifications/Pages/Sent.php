<?php

namespace App\Livewire\Pages\Dashboard\Pages\Notifications\Pages;

use Livewire\Component;

class Sent extends Component
{
    public function render()
    {
        return view('pages.dashboard.pages.notifications.pages.sent')
            ->layout('pages.dashboard.layouts.layout')
            ->title(trans('app.dashboard.profile.title'));
    }
}
