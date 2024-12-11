<?php

namespace App\Enums;

enum Status: string
{
    case Accepted = 'accepted';
    case Rejected = 'rejected';
    case Pending = 'pending';

    public static function values(): array
    {
        return array_map(fn($enum) => $enum->value, self::cases());
    }
}
