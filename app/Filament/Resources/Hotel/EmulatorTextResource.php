<?php

namespace App\Filament\Resources\Hotel;

use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\EmulatorText;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use App\Filament\Traits\TranslatableResource;
use App\Filament\Resources\Hotel\EmulatorTextResource\Pages;

class EmulatorTextResource extends Resource
{
    use TranslatableResource;

    protected static ?string $model = EmulatorText::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationGroup = 'Hotel';

    protected static ?string $slug = 'hotel/emulator-texts';

    public static string $translateIdentifier = 'emulator-texts';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('key')
                    ->label(__('filament::resources.inputs.key'))
                    ->required()
                    ->maxLength(100)
                    ->unique(ignoreRecord: true),

                TextInput::make('value')
                    ->label(__('filament::resources.inputs.value'))
                    ->required()
                    ->maxLength(512),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key')
                    ->label(__('filament::resources.columns.key'))
                    ->searchable(),

                TextColumn::make('value')
                    ->label(__('filament::resources.columns.value'))
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageEmulatorTexts::route('/'),
        ];
    }
}
