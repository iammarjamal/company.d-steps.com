<?php

namespace App\Livewire\Pages\Dashboard\Pages\Notifications\Pages;

use App\Events\UserNotificationDeleted;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Sent extends Component
{
    use WithPagination;

    public $confirmingDelete = false;
    public $notificationToBeDeleted = null;

//    protected $listeners = ['create' => 'handleCreate'];
//
//    public function handleCreate(){
//
//    }

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

    #[On('notification_created')]
    public function render()
    {
        $notifications = Notification::where('from', Auth::id())->orderBy('created_at', 'DESC')->paginate(10);

        return view('pages.dashboard.pages.notifications.pages.sent' , ['notifications' => $notifications]);
    }
}