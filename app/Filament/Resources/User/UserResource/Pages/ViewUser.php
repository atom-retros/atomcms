<?php

namespace App\Filament\Resources\User\UserResource\Pages;

use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\User\UserResource;

class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return static::$resource::fillWithOutsideData(
            $this->getRecord(),
            $data
        );
    }
}
