<?php

namespace App\Livewire\Components\Dashboard;

use Livewire\Attributes\On;
use Livewire\Component;

class Profile extends Component
{
    #[On('profile')]
    public function render()
    {
        return view('components.dashboard.profile');
    }
}
