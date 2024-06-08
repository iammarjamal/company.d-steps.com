<?php

namespace App\Livewire\Pages\Admin\Pages\Notifications\Pages;

use App\Events\UserNotificationSent;
use App\Jobs\SendNotificationsToUsers;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $users = null;
    public $title = null;
    public $content = null;
    public $query;
    public $tags = [];
    public $targetUsers = [];

    public function mount()
    {
        $this->users = User::where('id', '!=', auth()->id())->get();
    }

    public function selectContact()
    {
        sleep(1);
        $this->users = User::where('id', '!=', auth()->id())->where('username', 'like', '%' . $this->query . '%')
            ->get();
        $this->dispatch('select-contact');
    }


    public function createTag($id)
    {
        $this->resetValidation();
        if (!in_array($id ,$this->tags)) {
            $this->tags[] = $id;
        }
    }

    public function removeTag($id)
    {
        array_splice($this->tags, array_search($id, $this->tags), 1);
    }

    public function send()
    {
        $this->validate([
            'targetUsers' => 'required|array',
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $notifications = [];
        foreach ($this->targetUsers as $targetUser){
            $notifications[] =   Notification::create([
                'from' => Auth::user()->id,
                'to' => $targetUser->id,
                'title' => $this->title,
                'content' => $this->content
            ]);
        }

        SendNotificationsToUsers::dispatch($notifications);
        $this->reset(['targetUsers', 'title', 'content' , 'tags']);
        $this->dispatch('notification_created');
        session()->flash('success', 'تم إرسال الإشعار');
    }

    public function render()
    {
        $this->targetUsers  = User::whereIn('id' , $this->tags)->get();
        return view('pages.admin.pages.notifications.pages.create');
    }
}
