<?php

namespace App\Livewire\Components\Dashboard;

use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Notifications extends Component
{

    public function read($id)
    {   
        // if($id == 0){
        //     notification::where('user_id', Auth::user()->id)->where('status', 'unread')->where('role', 'user')->update([
        //         'status' => 'read',
        //         'updated_at' => Carbon::now()
        //     ]);
        // }else{
        //     notification::where('user_id', Auth::user()->id)->where('id', $id)->where('role', 'user')->update([
        //         'status' => 'read',
        //         'updated_at' => Carbon::now()
        //     ]);
        // }

        $this->dispatch('notification')->self();
    }

    #[On('notification')]
    public function render()
    {
        return view('components.dashboard.notifications', [
            'notifications' => 0,
            'number' => 0,
        ]);
    }
}
