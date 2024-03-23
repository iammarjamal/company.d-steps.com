<?php

namespace App\Livewire\Pages\Auth\Pages\Logout;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
        Auth::logout();   
        return redirect()->route('auth.login');
    }
}
