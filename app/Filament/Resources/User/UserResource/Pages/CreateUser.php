<?php

namespace App\Filament\Resources\User\UserResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\User\UserResource;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
}
