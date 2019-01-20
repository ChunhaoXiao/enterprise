<?php

namespace App\Listeners;

use App\Events\ProductCommented;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use Notification;
use App\Notifications\ProductCommented as CommentNotification;

class SendCommentNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProductCommented  $event
     * @return void
     */
    public function handle(ProductCommented $event)
    {
        $users = User::where('role_type', 'manager')->get();
       // \Log::info($users);
        Notification::send($users, new CommentNotification($event->comment));
    }
}
