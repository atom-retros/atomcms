<?php

namespace App\Filament\Resources\Atom\NavigationResource\RelationManagers;

use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Resources\RelationManagers\RelationManager;

class SubNavigationsRelationManager extends RelationManager
{
    protected static string $relationship = 'subNavigations';

    protected static ?string $recordTitleAttribute = 'label';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('label')
                    ->label(__('filament::resources.inputs.label'))
                    ->columnSpanFull()
                    ->required()
                    ->maxLength(255),

                TextInput::make('slug')
                    ->label(__('filament::resources.inputs.slug')),

                TextInput::make('order')
                    ->numeric()
                    ->minValue(0)
                    ->default(0)
                    ->label(__('filament::resources.columns.order')),

                Toggle::make('visible')
                    ->label(__('filament::resources.columns.visible')),

                Toggle::make('new_tab')
                    ->label(__('filament::resources.columns.new_tab')),
            ])
            ->columns([
                'sm' => 2
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('label'),

                TextColumn::make('slug')
                    ->label(__('filament::resources.columns.slug')),

                ToggleColumn::make('visible')
                    ->label(__('filament::resources.columns.visible')),

                ToggleColumn::make('new_tab')
                    ->label(__('filament::resources.columns.new_tab')),

                TextColumn::make('order')
                    ->label(__('filament::resources.columns.order'))
            ])
            ->reorderable('order')
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                // Tables\Actions\AssociateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DissociateAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DissociateBulkAction::make(),
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
