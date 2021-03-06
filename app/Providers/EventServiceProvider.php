<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        //登录事件
        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\RecordLoginIp',
        ],

        'App\Events\FileDownloaded' => [
            'App\Listeners\UpdateDownloadTimes',
        ],

        'App\Events\ProductCommented' => [
            'App\Listeners\SendCommentNotification',
        ],
        //第三方登录
        // \SocialiteProviders\Manager\SocialiteWasCalled::class => 
        // [
        //     'SocialiteProviders\Weixin\WeixinExtendSocialite@handle',
        // ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
