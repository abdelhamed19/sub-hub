<?php

namespace App\Enums;

enum PlanType: string
{
    case MONTHLY = 'monthly';
    case YEARLY = 'yearly';
    case LIFETIME = 'lifetime';

    public static function options(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}
