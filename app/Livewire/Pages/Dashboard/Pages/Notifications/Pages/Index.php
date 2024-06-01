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
    public function render()
    {
        return view('pages.dashboard.pages.notifications.pages.index')
            ->layout('pages.dashboard.layouts.layout')
            ->title(trans('app.dashboard.profile.title'));
    }
}