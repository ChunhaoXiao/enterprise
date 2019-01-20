<?php

namespace App\Listeners;

use App\Events\FileDownloaded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateDownloadTimes
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
     * @param  FileDownloaded  $event
     * @return void
     */
    public function handle(FileDownloaded $event)
    {
        $event->file->increment('times');
    }
}
