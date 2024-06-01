<?php

namespace App\Livewire\Components;

use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Notifications extends Component
{
    protected $listeners = [
        'notify' => 'refreshComponent'
    ];

    public function read($id)
    {
        if ($id == 0) {
            notification::where('to', Auth::user()->id)->where('status', 'unread')->update([
                'status' => 'read',
                'updated_at' => Carbon::now()
            ]);
        } else {
            notification::where('to', Auth::user()->id)->where('id', $id)->update([
                'status' => 'read',
                'updated_at' => Carbon::now()
            ]);
        }

        $this->dispatch('notification')->self();
    }

    public function refreshComponent()
    {

    }

    #[On('notification')]
    public function render()
    {
        return view('components.notifications', [
            'notifications' => Notification::where('to', Auth::user()->id)->orderBy('id', 'desc')->take(10)->get(),
            'number' => Notification::where('to', Auth::user()->id)->where('status', 'unread')->count(),
        ]);
    }
}
