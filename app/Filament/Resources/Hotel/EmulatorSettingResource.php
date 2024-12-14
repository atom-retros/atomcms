<?php

namespace App\Filament\Resources\Hotel;

use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\EmulatorSetting;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use App\Filament\Traits\TranslatableResource;
use App\Filament\Resources\Hotel\EmulatorSettingResource\Pages;

class EmulatorSettingResource extends Resource
{
    use TranslatableResource;

    protected static ?string $model = EmulatorSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-adjustments-horizontal';

    protected static ?string $navigationGroup = 'Hotel';

    public static string $translateIdentifier = 'emulator-settings';

    protected static ?string $slug = 'hotel/emulator-settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
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
                    ])
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
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
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
            'index' => Pages\ListEmulatorSettings::route('/'),
            'create' => Pages\CreateEmulatorSetting::route('/create'),
            'edit' => Pages\EditEmulatorSetting::route('/{record}/edit'),
        ];
    }
}
