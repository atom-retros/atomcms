<?php

namespace App\Enums;

enum AchievementCategory: string
{
    case Identity = 'identity';
    case Explore = 'explore';
    case Music = 'music';
    case Social = 'social';
    case Games = 'games';
    case RoomBuilder = 'room_builder';
    case Pets = 'pets';
    case Tools = 'tools';
    case Events = 'events';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function toInput(): array
    {
        $allCurrencies = self::cases();

        return array_combine(
            array_column($allCurrencies, 'value'),
            array_column($allCurrencies, 'name'),
        );
    }
}
