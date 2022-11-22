<?php

namespace App\Filament\Resources\Catalog;

use Filament\Forms;
use Filament\Tables;
use App\Models\CatalogPage;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Catalog\CatalogPageResource\Pages;
use App\Filament\Resources\Catalog\CatalogPageResource\RelationManagers;

class CatalogPageResource extends Resource
{
    protected static ?string $model = CatalogPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';

    protected static ?string $navigationGroup = 'Catalog';

    protected static ?string $navigationLabel = 'Catalog Pages Manager';

    protected static ?string $slug = 'catalog/catalog-pages';

    protected static ?string $label = 'catalog page';

    protected static ?string $pluralLabel = 'catalog pages';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListCatalogPages::route('/'),
            'create' => Pages\CreateCatalogPage::route('/create'),
            'edit' => Pages\EditCatalogPage::route('/{record}/edit'),
        ];
    }
}
