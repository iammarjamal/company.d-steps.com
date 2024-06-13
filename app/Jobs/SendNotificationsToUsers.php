<?php

namespace App\Jobs;

use App\Events\UserNotificationSent;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendNotificationsToUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $userIds;
    public $from;
    public $title;
    public $content;

    /**
     * Create a new job instance.
     */
    public function __construct($userIds, $from , $title, $content)
    {
        $this->userIds = $userIds;
        $this->from = $from;
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $users = User::whereIn('id', $this->userIds)->get();

        if ($users->isEmpty()) {
            Log::error('No users found for the provided IDs.', [
                'userIds' => $this->userIds
            ]);
            return;
        }

        $notifications = [];
        foreach ($users as $user) {
            $notifications[] = Notification::create([
                'from' => $this->from,
                'to' => $user->id,
                'title' => $this->title,
                'content' => $this->content,
            ]);
        }

        foreach ($notifications as $notification) {
            UserNotificationSent::dispatch($notification);
            Log::info('A notification was sent to: ' . $notification->to . ' with title: '. $this->title);
        }
    }
}
