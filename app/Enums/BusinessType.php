<?php

namespace App\Enums;

enum BusinessType: string
{
    case INDIVIDUAL = 'individual';
    case COMPANY = 'company';
    case NON_PROFIT = 'non_profit';
    case GOVERNMENT = 'government';

    public static function options(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }

    // اختياري: للعرض الجميل
    public function label(): string
    {
        return match ($this) {
            self::INDIVIDUAL => __('mutual.individual'),
            self::COMPANY => __('mutual.company'),
            self::NON_PROFIT => __('mutual.non_profit'),
            self::GOVERNMENT => __('mutual.government'),
        };
    }
}
