<?php

namespace App\Livewire\Pages\Admin\Pages\Notifications\Pages;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Inbox extends Component
{
    public $search;

    public function filters()
    {
        $this->validate([
            'search' => 'nullable|string',
        ]);
    }

    public function resetFilters()
    {
        $this->search = "";
    }

    #[On('notify')]
    #[On('reverb_notification_sent')]
    #[On('reverb_notification_deleted')]
    public function render()
    {
//        $notifications = Notification::where('to', Auth::id())->orderBy('created_at', 'DESC')->paginate(10);

        $notificationsQuery = Notification::where('to', Auth::id())->orderBy('created_at', 'DESC');

        if ($this->search) {
            $notificationsQuery->where('to', 'like', '%' . $this->search . '%')
                ->orWhere('title', 'like', '%' . $this->search . '%')
                ->orWhere('content', 'like', '%' . $this->search . '%');
        }

        $notifications = $notificationsQuery->paginate(10);

        return view('pages.admin.pages.notifications.pages.inbox' ,['notifications' => $notifications]);
    }
}
