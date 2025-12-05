<?php

namespace App\Enums;

enum SuperAdminRole: string
{
    case SUPER = 'super';
    case SUPPORT = 'support';
    case AUDITOR = 'auditor';

    public static function values(): array
    {
        return array_map(fn($role) => $role->value, self::cases());
    }
}
