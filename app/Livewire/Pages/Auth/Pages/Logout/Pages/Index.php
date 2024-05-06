<?php

namespace App\Livewire\Pages\Auth\Pages\Logout\Pages;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        Auth::logout();   
        return redirect()->route('auth.login');
    }
}
