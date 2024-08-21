<?php

namespace App\Enums;

class TaskStatus
{
    const PENDING = 'pending';
    const IN_PROCESSING = 'in_processing';
    const COMPLETED = 'completed';
    const CANCELED = 'rejected';
    const Done = 'done';

    /**
     * Get all statuses as an array.
     *
     * @return array
     */
    public static function getValues(): array
    {
        return [
            self::PENDING,
            self::IN_PROCESSING,
            self::COMPLETED,
            self::CANCELED,
            self::Done,
        ];
    }
}
