<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\Permission;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $recordTitleAttribute = 'username';

    protected static ?string $navigationGroup = 'Users';

    protected static ?string $navigationLabel = 'User Manager';

    protected static ?int $navigationSort = 1;

    protected static ?string $slug = 'users/manage-manager';

    protected static ?string $label = 'Users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('username')
                    ->required()
                    ->autofocus()
                    ->placeholder('Enter a username...'),

                TextInput::make('mail')
                    ->label('Email')
                    ->required()
                    ->placeholder('Enter an email...'),

                TextInput::make('motto')
                    ->required()
                    ->placeholder('Enter a motto...'),

                Forms\Components\Select::make('rank')
                    ->options(Permission::all()->pluck('rank_name', 'id'))
                    ->required()
                    ->placeholder('Enter a username...'),

                TextInput::make('credits')
                    ->numeric()
                    ->required()
                    ->minValue(0)
                    ->placeholder('Enter a credit amount...'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('username')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('mail'),
                Tables\Columns\TextColumn::make('permission.rank_name')->label('Rank'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            'currencies' => RelationManagers\CurrenciesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
