<?php

namespace App\Filament\Resources\Hotel\EmulatorSettingResource\Pages;

use App\Filament\Resources\Hotel\EmulatorSettingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmulatorSettings extends ListRecords
{
    protected static string $resource = EmulatorSettingResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
