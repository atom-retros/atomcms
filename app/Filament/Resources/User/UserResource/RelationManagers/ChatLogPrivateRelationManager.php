<?php

namespace App\Filament\Resources\User\UserResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Filament\Resources\Hotel\ChatlogPrivateResource;
use Filament\Resources\RelationManagers\RelationManager;

class ChatLogPrivateRelationManager extends RelationManager
{
    protected static string $relationship = 'chatLogsPrivate';

    protected static $targetResource = ChatlogPrivateResource::class;

    public function form(Form $form): Form
    {
        return $form;
    }

    public function table(Table $table): Table
    {
        return $table->columns(ChatlogPrivateResource::getTable())
            ->defaultSort('timestamp', 'desc');
    }
}
