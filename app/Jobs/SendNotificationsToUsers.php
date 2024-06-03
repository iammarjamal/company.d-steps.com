<?php

namespace App\Jobs;

use App\Events\UserNotificationSent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendNotificationsToUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $notifications;
    /**
     * Create a new job instance.
     */
    public function __construct($notifications)
    {
        $this->notifications = $notifications;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
         foreach ($this->notifications as $notification){
             UserNotificationSent::dispatch($notification);
         }
    }
}
