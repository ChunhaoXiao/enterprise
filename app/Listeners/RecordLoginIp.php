<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Admin;
use Carbon\Carbon;

class RecordLoginIp
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
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $user = $event->user;
        if(is_a($user, Admin::class))
        {
            $user->update([
                'last_login_ip' => request()->ip(),
                'last_login_time' => Carbon::now(),
            ]);
        }
    }
}
