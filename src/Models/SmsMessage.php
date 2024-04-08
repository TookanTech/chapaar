<?php

namespace TookanTech\Chapaar\Models;

use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Model;
use TookanTech\Chapaar\Enums\Drivers;

/**
 * @property Drivers $driver
 * @property AsCollection $data
 * @property-write  int $status
 *
 */
class SmsMessage extends Model
{
    protected $fillable = [
        'driver',
        'data',
        'status',
    ];

    protected $casts = [
        'driver' => Drivers::class,
        'data' => AsCollection::class,
    ];
}
