<?php

namespace App\Filament\Resources\Hotel\AchievementResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\LatestResourcesTrait;
use App\Filament\Resources\Hotel\AchievementResource;

class ListAchievements extends ListRecords
{
    protected static string $resource = AchievementResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
