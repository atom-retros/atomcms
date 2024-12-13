<?php

namespace App\Filament\Resources\User\BanResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use App\Filament\Resources\User\BanResource;

class ManageBans extends ManageRecords
{
    protected static string $resource = BanResource::class;

    protected function getActions(): array
    {
        return [
            // ...
        ];
    }
}
