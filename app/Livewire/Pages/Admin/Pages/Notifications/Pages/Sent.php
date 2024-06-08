<?php

namespace App\Livewire\Pages\Admin\Pages\Notifications\Pages;

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

    public $search;

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

    #[On('notification_created')]
    public function render()
    {
//        $notifications = Notification::where('from', Auth::id())->orderBy('created_at', 'DESC')->paginate(10);

        $notificationsQuery = Notification::where('from', Auth::id())->orderBy('created_at', 'DESC');

        if ($this->search) {
            $notificationsQuery->where('to', 'like', '%' . $this->search . '%')
            ->orWhere('title', 'like', '%' . $this->search . '%')
            ->orWhere('content', 'like', '%' . $this->search . '%');
        }

        $notifications = $notificationsQuery->paginate(10);

        return view('pages.admin.pages.notifications.pages.sent' , [
            'notifications' => $notifications
            ]);
    }
}
