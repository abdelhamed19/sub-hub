<?php

namespace App\Enums;

enum ClientAssistantRole: string
{
    case ADMIN = 'admin';
    case MANAGER = 'manager';
    case VIEWER = 'viewer';

    public static function values(): array
    {
        return array_map(fn($role) => $role->value, self::cases());
    }
}
