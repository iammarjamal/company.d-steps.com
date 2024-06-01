<?php

namespace App\Livewire\Pages\Dashboard\Pages\Notifications\Pages;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Inbox extends Component
{
    #[On('notify')]
    public function render()
    {
        $notifications = Notification::where('to', Auth::id())->orderBy('created_at', 'DESC')->paginate(10);

        return view('pages.dashboard.pages.notifications.pages.inbox' ,['notifications' => $notifications]);
    }
}
