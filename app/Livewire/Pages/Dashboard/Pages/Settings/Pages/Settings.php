<?php

namespace App\Livewire\Pages\Dashboard\Pages\Settings\Pages;

use Livewire\Component;

class Settings extends Component
{
    public function render()
    {
        return view('pages.dashboard.pages.settings.pages.settings')
        ->layout('pages.dashboard.layouts.layout')
        ->title(trans('app.auth.login.title'));
    }
}
