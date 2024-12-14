<?php

namespace App\Filament\Resources\Hotel\EmulatorTextResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use App\Filament\Resources\Hotel\EmulatorTextResource;
use Filament\Actions\CreateAction;

class ManageEmulatorTexts extends ManageRecords
{
    protected static string $resource = EmulatorTextResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make('create')
        ];
    }

    public function getPrimaryKey(): string
    {
        return 'key';
    }
}
