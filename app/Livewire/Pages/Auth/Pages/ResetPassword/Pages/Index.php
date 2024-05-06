<?php

namespace App\Livewire\Pages\Auth\Pages\ResetPassword\Pages;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('pages.auth.pages.reset-password.pages.index')
        ->layout('pages.auth.layouts.layout') 
        ->title(trans('app.auth.login.title'));
    }
}
