<?php

namespace App\Livewire\Pages\Dashboard\Pages\Notifications\Pages;

use App\Events\UserNotificationSent;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $users = null;
    public $targetUser = null;
    public $title = null;
    public $content = null;

    public function mount()
    {
        $this->users = User::where('id', '!=', auth()->id())->get();
    }

    public function send()
    {
        $this->validate([
            'targetUser' => 'required|exists:users,id',
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $notification = Notification::create([
            'from' => Auth::user()->id,
            'to' => $this->targetUser,
            'title' => $this->title,
            'content' => $this->content
        ]);

        $this->reset(['targetUser', 'title', 'content']);
        $this->dispatch('notification_created');
        session()->flash('success' , 'تم إرسال الإشعار');
        UserNotificationSent::dispatch($notification);

    }

    public function render()
    {
        return view('pages.dashboard.pages.notifications.pages.create');
    }
}
