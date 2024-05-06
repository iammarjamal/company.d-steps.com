<?php

namespace App\Livewire\Pages\Auth\Pages\Logout\Pages;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('auth.login');
    }
}
