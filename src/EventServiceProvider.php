<?php

namespace TookanTech\Chapaar;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use TookanTech\Chapaar\Events\SmsSent;
use TookanTech\Chapaar\Events\StoreSmsMessage;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        SmsSent::class => [
            StoreSmsMessage::class,
        ],
    ];
}
