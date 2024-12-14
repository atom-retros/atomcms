<?php

namespace App\Filament\Resources\Hotel\ChatlogRoomResource\Pages;

use App\Filament\Resources\Hotel\ChatlogRoomResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageChatlogRooms extends ManageRecords
{
    protected static string $resource = ChatlogRoomResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
