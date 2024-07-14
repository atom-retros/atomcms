<?php

namespace App\Filament\Resources;

use Filament\Actions;
use Filament\Resources\Pages\ManageRecords as BaseManageRecords;

class ManageRecords extends BaseManageRecords
{
    public static string $resource = '';

    /**
     * Get the header actions for the resource.
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}