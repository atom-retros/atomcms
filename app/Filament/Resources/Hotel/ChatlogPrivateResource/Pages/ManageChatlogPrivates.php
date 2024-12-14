<?php

namespace App\Filament\Resources\Hotel\ChatlogPrivateResource\Pages;

use App\Filament\Resources\Hotel\ChatlogPrivateResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageChatlogPrivates extends ManageRecords
{
    protected static string $resource = ChatlogPrivateResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
