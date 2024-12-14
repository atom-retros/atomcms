<?php

namespace App\Filament\Resources\User\UserResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Filament\Resources\Hotel\ChatlogRoomResource;
use Filament\Resources\RelationManagers\RelationManager;

class ChatLogRelationManager extends RelationManager
{
    protected static string $relationship = 'chatLogs';

    protected static $targetResource = ChatlogRoomResource::class;

    public function form(Form $form): Form
    {
        return $form;
    }

    public function table(Table $table): Table
    {
        return $table->columns(ChatlogRoomResource::getTable())
            ->defaultSort('timestamp', 'desc');
    }
}
