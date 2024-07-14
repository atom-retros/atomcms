<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource as BaseResource;
use Filament\Tables\Table;
use Filament\Forms\Form;
use Filament\Tables;

abstract class Resource extends BaseResource
{
    /**
     * The navigation icon for the resource.
     */
    protected static ?string $navigationIcon = null;

    /**
     * The schema for the resource.
     */
    abstract public static function schema(Form $form): array;

    /**
     * Get the columns for the resource.
     */
    abstract public static function columns(Table $table): array;

    /**
     * Get the filters for the resource.
     */
    public static function filters(Table $table): array
    {
        return [];
    }

    /**
     * Get the actions for the resource.
     */
    public static function actions(Table $table): array
    {
        return [
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ];
    }

    /**
     * Get the bulk actions for the resource.
     */
    public static function bulkActions(Table $table): array
    {
        return [
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ];
    }

    /**
     * Get the form for the resource.
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema(static::schema($form));
    }

    /**
     * Get the table for the resource.
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns(static::columns($table))
            ->filters(static::filters($table))
            ->actions(static::actions($table))
            ->bulkActions(static::bulkActions($table));
    }

    /**
     * Get the pages for the resource.
     */
    public static function getPages(): array
    {
        ManageRecords::$resource = static::class;

        return [
            'index' => ManageRecords::route('/'),
        ];
    }
}