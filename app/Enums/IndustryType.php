<?php

namespace App\Enums;

enum IndustryType: string
{
    case TECHNOLOGY = 'technology';
    case HEALTHCARE = 'healthcare';
    case EDUCATION = 'education';
    case RETAIL = 'retail';
    case MANUFACTURING = 'manufacturing';
    case FINANCE = 'finance';
    case REAL_ESTATE = 'real_estate';
    case HOSPITALITY = 'hospitality';
    case TRANSPORTATION = 'transportation';
    case ENERGY = 'energy';
    case AGRICULTURE = 'agriculture';
    case MEDIA = 'media';
    case OTHER = 'other';

    public static function options(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }

    public function label(): string
    {
        return match ($this) {
            self::TECHNOLOGY => __('mutual.technology'),
            self::HEALTHCARE => __('mutual.healthcare'),
            self::EDUCATION => __('mutual.education'),
            self::RETAIL => __('mutual.retail'),
            self::MANUFACTURING => __('mutual.manufacturing'),
            self::FINANCE => __('mutual.finance'),
            self::REAL_ESTATE => __('mutual.real_estate'),
            self::HOSPITALITY => __('mutual.hospitality'),
            self::TRANSPORTATION => __('mutual.transportation'),
            self::ENERGY => __('mutual.energy'),
            self::AGRICULTURE => __('mutual.agriculture'),
            self::MEDIA => __('mutual.media'),
            self::OTHER => __('mutual.other'),
        };
    }
}
