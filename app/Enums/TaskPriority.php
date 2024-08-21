<?php

namespace App\Enums;

class TaskPriority
{
    const LOW = 'low';
    const MEDIUM = 'medium';
    const HIGH = 'HIGH';


    /**
     * Get all statuses as an array.
     *
     * @return array
     */
    public static function getValues(): array
    {
        return [
            self::LOW,
            self::MEDIUM,
            self::HIGH,
        ];
    }
}
