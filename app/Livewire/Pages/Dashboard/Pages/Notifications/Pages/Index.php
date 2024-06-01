<?php

namespace App\Livewire\Pages\Dashboard\Pages\Notifications\Pages;

use App\Events\UserNotificationDeleted;
use App\Events\UserNotificationSent;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $confirmingDelete = false;
    public $users = null;
    public $targetUser = null;
    public $title = null;
    public $content = null;
    public $notificationToBeDeleted = null;

    public function confirmDelete($id)
    {
        $this->confirmingDelete = true;
        $this->notificationToBeDeleted = $id;
    }

    public function deleteNotification()
    {
        $notification = Notification::findOrFail($this->notificationToBeDeleted);
        $id = $notification->to;
        $notification->delete();
        $this->confirmingDelete = false;
        UserNotificationDeleted::dispatch($id);
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
        UserNotificationSent::dispatch($notification);

    }

    public function mount()
    {
        $this->users = User::all();
    }

    public function render()
    {
        $notifications = Notification::where('from', Auth::id())->orderBy('created_at', 'DESC')->paginate(10);

        return view('pages.dashboard.pages.notifications.pages.index', ['notifications' => $notifications])
            ->layout('pages.dashboard.layouts.layout')
            ->title(trans('app.dashboard.profile.title'));
    }
}
