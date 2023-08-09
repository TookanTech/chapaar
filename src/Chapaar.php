<?php

namespace Aryala7\Chapaar;

use Aryala7\Chapaar\Contracts\DriverConnector;
use Aryala7\Chapaar\Contracts\DriverMessage;
use Aryala7\Chapaar\Drivers\Kavenegar\KavenegarConnector;
use Aryala7\Chapaar\Drivers\SmsIr\SmsIrConnector;
use Aryala7\Chapaar\Exceptions\DriverNotFoundException;

class Chapaar
{

    protected DriverConnector $driver;
    public function __construct()
    {
        $this->driver = $this->getDefaultDriver();
    }

    /**
     * @return DriverConnector
     */
    public function getDefaultDriver(): DriverConnector
    {

        return match (config('chapaar.default')) {
            'kavenegar' => (new KavenegarConnector),
            'smsir' => (new SmsIrConnector),
            default => function(){
                throw new DriverNotFoundException('Unknown Driver' . config('chapaar.default'));
            }
        };
    }

    public function send(SmsMessage $message)
    {
        return $this->driver->send($message);
    }

    public function verify(SmsMessage $message)
    {
        return $this->driver->verify($message);
    }
}
